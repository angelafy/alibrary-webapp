<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Buku;
use App\Models\DetailKeranjang;
use App\Models\keranjang;
use App\Services\MidtransService;
use App\Models\Peminjaman;
use App\Models\Denda;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Midtrans\Transaction;
use Midtrans\Notification;



class PeminjamanController extends Controller
{
    protected $midtransService;

    public function __construct(MidtransService $midtransService)
    {
        $this->midtransService = $midtransService;
    }
    public function index(Request $request)
    {
        $peminjamans = Peminjaman::with(['detailPeminjaman.buku'])
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(10)
            ->through(function ($peminjaman) {

                if (
                    ($peminjaman->status == 0 || $peminjaman->status == 1 || $peminjaman->status == 2 || $peminjaman->status == 6)
                    && $peminjaman->tgl_kembali < now()
                ) {
                    $peminjaman->status = 4;
                    $peminjaman->save();
                    $this->calculateAndStoreDenda($peminjaman);
                }
                return $peminjaman;
            });

        return view('client.buku.pinjam.peminjaman', compact('peminjamans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required|exists:buku,id',
        ]);

        $buku = Buku::find($request->buku_id);
        $keranjang = Keranjang::where('user_id', Auth::id())->first();
        $existingKeranjang = DetailKeranjang::where('keranjang_id', $keranjang->id)
            ->where('buku_id', $buku->id)
            ->first();

        if (!$existingKeranjang) {
            return response()->json(['message' => 'Buku ini tidak ada di keranjang.'], 400);
        }

        // Gawe generate random string gawe kode
        $kodePeminjaman = strtoupper(Str::random(12));

        $peminjaman = Peminjaman::create([
            'user_id' => Auth::id(),
            'kode_peminjaman' => $kodePeminjaman,
            // 'tgl_pinjam' => now(),
            'tgl_kembali' => now()->addDays(3),
            'status' => false,
        ]);

        $keranjangItems = DetailKeranjang::where('keranjang_id', $keranjang->id)->get();
        $detailPeminjamanData = $keranjangItems->map(function ($keranjangItem) use ($peminjaman) {
            return [
                'peminjaman_id' => $peminjaman->id,
                'buku_id' => $keranjangItem->buku_id,
                'jumlah' => $keranjangItem->jumlah,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        });

        DB::table('detail_peminjaman')->insert($detailPeminjamanData->toArray());

        DetailKeranjang::where('keranjang_id', $keranjang->id)->delete();
        $keranjang->delete();

        return response()->json(['message' => 'Peminjaman berhasil diproses.']);
    }


    public function checkout()
    {
        $keranjang = session()->get('keranjang', []);

        if (empty($keranjang)) {
            return redirect()->route('pinjam.keranjang')->with('error', 'Keranjang Anda kosong.');
        }
        return view('client.buku.pinjam.checkout', compact('keranjang'));
    }
    public function process(Request $request)
    {
        $keranjang = session()->get('keranjang', []);
        if (empty($keranjang)) {
            return redirect()->route('pinjam.keranjang')->with('error', 'Keranjang Anda kosong.');
        }
        session()->forget('keranjang');

        return redirect()->route('pinjam.keranjang')->with('success', 'Peminjaman berhasil.');
    }

    private function calculateAndStoreDenda(Peminjaman $peminjaman)
    {
        $denda = Denda::firstOrNew(['peminjaman_id' => $peminjaman->id]);
        // Kalkulasi keterlambatan
        $daysLate = Carbon::parse($peminjaman->tgl_kembali)->diffInDays(now());
        // Kalkulasi total dendanya om
        $totalDenda = 10000;
        if ($daysLate > 1) {
            $totalDenda += ($daysLate - 1) * 5000;
        }
        // Update or create the denda record
        $denda->jumlah = $totalDenda;
        $denda->save();

        return $denda;
    }
    public function showDetail($id)
    {
        $peminjaman = Peminjaman::with(['user', 'detailPeminjaman.buku', 'denda'])
            ->findOrFail($id);
        if (
            ($peminjaman->status == 0 || $peminjaman->status == 1 || $peminjaman->status == 2 || $peminjaman->status == 6)
            && $peminjaman->tgl_kembali < now()
        ) {

            // Update status to Terlambat (4)
            $peminjaman->status = 4;
            $peminjaman->save();
            $this->calculateAndStoreDenda($peminjaman);
        }

        return view('client.buku.pinjam.detail_peminjaman', compact('peminjaman'));
    }

    public function updateStatusToPendingPengembalian($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        if ($peminjaman->status == 2) {
            // Check afakah terlambat atau gak wakoawokwa
            if ($peminjaman->tgl_kembali < now()) {
                $peminjaman->status = 4; // Set status terlambat
                $this->calculateAndStoreDenda($peminjaman);
            } else {
                $peminjaman->status = 6;
            }

            $peminjaman->save();

            return redirect()->back()->with('success', 'Status peminjaman telah diperbarui');
        }
        return redirect()->back()->with('error', 'Peminjaman tidak dapat diperbarui');
    }
    public function initiatePayment($id)
    {
        try {
            $peminjaman = Peminjaman::with(['denda', 'user'])->findOrFail($id);
            $denda = $peminjaman->denda;

            // Jika tidak ada denda atau denda sudah dibayar
            if (!$denda || $denda->status) {
                return response()->json([
                    'error' => 'Tidak ada pembayaran yang perlu dilakukan'
                ], 400);
            }
            if ($denda->pending_payment_id && $denda->pending_payment_until) {
                if ($denda->pending_payment_until > now()) {
                    return response()->json([
                        'status' => 'pending',
                        'message' => 'Pembayaran dalam proses',
                        'snap_token' => $denda->pending_payment_id,
                        'expires_at' => $denda->pending_payment_until->format('Y-m-d H:i:s'),
                        'order_id' => $denda->order_id
                    ]);
                }
                // Reset pending payment data if expired
                $denda->update([
                    'pending_payment_id' => null,
                    'pending_payment_until' => null,
                    'order_id' => null
                ]);
            }
            $result = $this->midtransService->createTransaction($peminjaman);

            return response()->json([
                'status' => 'success',
                'message' => 'Invoice berhasil dibuat',
                'snap_token' => $result['snap_token'],
                'expires_at' => $result['expires_at'],
                'order_id' => $result['order_id']
            ]);

        } catch (\Exception $e) {
            Log::error('Payment initiation failed: ' . $e->getMessage());
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function updatePaymentStatus($id)
    {
        try {
            date_default_timezone_set('Asia/Jakarta');

            DB::beginTransaction();
            $peminjaman = Peminjaman::findOrFail($id);
            $denda = Denda::where('peminjaman_id', $id)->first();

            if (!$denda) {
                DB::rollBack();
                return response()->json(['error' => 'Denda tidak ditemukan.'], 404);
            }

            $denda->status = true;
            $denda->tanggal_pembayaran = now();
            $denda->save();

            $updateResult = DB::table('peminjaman')
                ->where('id', $id)
                ->update([
                    'status' => 6,
                    'tgl_kembali' => now()->addDays(365),
                    // 'tgl_dikembalikan' => now(),
                    'updated_at' => now()
                ]);

            \Log::info('Update peminjaman result:', [
                'peminjaman_id' => $id,
                'update_result' => $updateResult,
                'current_datetime' => now()->format('Y-m-d H:i:s'),
                'timezone' => date_default_timezone_get(),
                'peminjaman_data' => DB::table('peminjaman')->where('id', $id)->first()
            ]);

            if (!$updateResult) {
                DB::rollBack();
                throw new \Exception('Gagal mengupdate tabel peminjaman');
            }

            DB::commit();
            $updatedPeminjaman = Peminjaman::find($id);

            return response()->json([
                'success' => 'Pembayaran berhasil!',
                'peminjaman_message' => 'Status peminjaman dan tanggal kembali berhasil diperbarui.',
                'debug_info' => [
                    'peminjaman_id' => $id,
                    'new_status' => $updatedPeminjaman->status,
                    'tgl_kembali' => $updatedPeminjaman->tgl_kembali,
                    'tgl_dikembalikan' => $updatedPeminjaman->tgl_dikembalikan,
                    'timezone' => date_default_timezone_get()
                ]
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Payment status update failed: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            return response()->json(['error' => 'Gagal memperbarui status pembayaran: ' . $e->getMessage()], 500);
        }
    }



}





