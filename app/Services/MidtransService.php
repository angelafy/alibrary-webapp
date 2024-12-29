<?php

namespace App\Services;

use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Peminjaman;
use App\Models\Denda;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class MidtransService
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    public function createTransaction(Peminjaman $peminjaman)
    {
        $denda = $peminjaman->denda;

        if (!$denda) {
            throw new \Exception('Tidak ada denda yang perlu dibayar');
        }

        if ($denda->status) {
            throw new \Exception('Denda sudah dibayar');
        }

        // Cek apakah ada invoice aktif
        if ($denda->order_id && $denda->pending_payment_id && $denda->pending_payment_until) {
            // Jika invoice masih aktif (belum expired)
            if ($denda->pending_payment_until->gt(now())) {
                return [
                    'snap_token' => $denda->pending_payment_id,
                    'order_id' => $denda->order_id,
                    'expires_at' => $denda->pending_payment_until->format('Y-m-d H:i:s'),
                    'message' => 'Menggunakan invoice yang masih aktif'
                ];
            } else {
                // Jika invoice sudah expired, hapus data invoice lama
                $denda->update([
                    'pending_payment_until' => null,
                    'pending_payment_id' => null,
                    'order_id' => null
                ]);
            }
        }

        // Buat invoice baru jika tidak ada yang aktif
        $orderId = 'DENDA-' . $peminjaman->kode_peminjaman . '-' . time();
        $expiryTime = now()->addHour();

        $transactionDetails = [
            'order_id' => $orderId,
            'gross_amount' => (int) $denda->jumlah
        ];

        $itemDetails = [
            [
                'id' => 'DENDA-' . $denda->id,
                'price' => (int) $denda->jumlah,
                'quantity' => 1,
                'name' => 'Denda Keterlambatan - ' . $peminjaman->kode_peminjaman
            ]
        ];

        $customerDetails = [
            'first_name' => $peminjaman->user->name ?? 'Pengguna',
            'email' => $peminjaman->user->email ?? 'noreply@example.com'
        ];

        $transactionData = [
            'transaction_details' => $transactionDetails,
            'item_details' => $itemDetails,
            'customer_details' => $customerDetails,
        ];

        try {
            $snapToken = Snap::getSnapToken($transactionData);

            $denda->update([
                'order_id' => $orderId,
                'pending_payment_id' => $snapToken,
                'pending_payment_until' => $expiryTime
            ]);

            return [
                'snap_token' => $snapToken,
                'order_id' => $orderId,
                'expires_at' => $expiryTime->format('Y-m-d H:i:s'),
                'message' => 'Invoice baru dibuat'
            ];
        } catch (\Exception $e) {
            \Log::error('Midtrans Error: ' . $e->getMessage());
            throw new \Exception('Gagal membuat transaksi: ' . $e->getMessage());
        }
    }
    public function handleCallback($notification)
    {
        try {
            Log::info('Processing payment notification:', ['notification' => $notification]);

            $orderId = $notification->order_id ?? null;
            $transactionStatus = $notification->transaction_status ?? null;
            $fraudStatus = $notification->fraud_status ?? null;
            $grossAmount = $notification->gross_amount ?? 0;

            if (!$orderId) {
                throw new \Exception('Invalid order ID');
            }

            $denda = Denda::where('order_id', $orderId)->firstOrFail();
            $peminjaman = $denda->peminjaman;

            if (!$peminjaman) {
                throw new \Exception('Peminjaman not found');
            }
            if ((int) $grossAmount !== (int) $denda->jumlah) {
                Log::warning('Amount mismatch', [
                    'expected' => $denda->jumlah,
                    'received' => $grossAmount
                ]);
                return false;
            }

            Log::info('Payment status:', [
                'order_id' => $orderId,
                'status' => $transactionStatus,
                'fraud_status' => $fraudStatus
            ]);

            switch ($transactionStatus) {
                case 'capture':
                case 'settlement':
                    if ($fraudStatus === 'accept' || $fraudStatus === null) {
                        return $this->processSuccessPayment($denda, $peminjaman);
                    }
                    break;
                case 'pending':
                    return true;
                case 'deny':
                case 'expire':
                case 'cancel':
                    $denda->update([
                        'pending_payment_until' => null,
                        'pending_payment_id' => null,
                        'order_id' => null
                    ]);
                    return true;
            }

            return false;
        } catch (\Exception $e) {
            Log::error('Callback processing error:', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    private function processSuccessPayment(Denda $denda, Peminjaman $peminjaman)
    {
        try {
            \DB::transaction(function () use ($denda, $peminjaman) {
                $denda->update([
                    'status' => true,
                    'tanggal_pembayaran' => now(),
                    'pending_payment_until' => null,
                    'pending_payment_id' => null,
                    'order_id' => null
                ]);

                $peminjaman->update([
                    'status' => 6 // Status Pending Pengembalian
                ]);
            });

            return true;
        } catch (\Exception $e) {
            \Log::error('Process Payment Error: ' . $e->getMessage());
            return false;
        }
    }
}