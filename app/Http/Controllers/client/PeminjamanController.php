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

            if (!$peminjaman->denda || $peminjaman->denda->status) {
                return response()->json([
                    'error' => 'Tidak ada pembayaran yang perlu dilakukan'
                ], 400);
            }
            $denda = $peminjaman->denda;
            if ($denda->pending_payment_until && $denda->pending_payment_until > now()) {
                return response()->json([
                    'error' => 'Pembayaran sedang dalam proses. Silakan selesaikan pembayaran atau tunggu hingga ' .
                        $denda->pending_payment_until->format('H:i'),
                    'pending_payment' => true,
                    'snap_token' => $denda->pending_payment_id,
                    'expires_at' => $denda->pending_payment_until->format('Y-m-d H:i:s')
                ], 400);
            }

            $result = $this->midtransService->createTransaction($peminjaman);

            return response()->json($result);
        } catch (\Exception $e) {
            Log::error('Payment initiation failed: ' . $e->getMessage());
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function handlePaymentCallback(Request $request)
    {
        try {
            Log::info('Callback received:', ['payload' => $request->all()]); // Tambahkan logging
            $signatureKey = config('midtrans.server_key');
            $orderId = $request->order_id;
            $statusCode = $request->status_code;
            $grossAmount = $request->gross_amount;
            $serverKey = $signatureKey;
            $signature = $request->signature_key;

            $validSignatureKey = hash('sha512', $orderId . $statusCode . $grossAmount . $serverKey);

            if ($signature !== $validSignatureKey) {
                Log::warning('Invalid signature');
                return response()->json(['error' => 'Invalid signature'], 400);
            }

            $success = $this->midtransService->handleCallback((object) $request->all());

            Log::info('Callback processed:', ['success' => $success]);

            return response()->json(['success' => $success]);
        } catch (\Exception $e) {
            Log::error('Payment callback error:', ['error' => $e->getMessage()]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    private function markPaymentComplete(Denda $denda, Peminjaman $peminjaman)
    {
        DB::transaction(function () use ($denda, $peminjaman) {
            $denda->update([
                'status' => true,
                'tanggal_pembayaran' => now()
            ]);

            $peminjaman->update([
                'status' => 6
            ]);
        });
    }
}
