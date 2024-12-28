<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Buku;
use App\Models\DetailKeranjang;
use App\Models\keranjang;
use App\Models\Peminjaman;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class PeminjamanController extends Controller
{
    public function index(Request $request)
    {
        // Mendapatkan data peminjaman milik user yang sedang login
        $peminjamans = Peminjaman::with(['detailPeminjaman.buku'])
            ->where('user_id', auth()->id())
            ->paginate(10); // Menampilkan 10 item per halaman

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

        // Generate kode_peminjaman unik
        $kodePeminjaman = strtoupper(Str::random(12));

        // Buat peminjaman baru
        $peminjaman = Peminjaman::create([
            'user_id' => Auth::id(),
            'kode_peminjaman' => $kodePeminjaman,
            'tgl_pinjam' => now(),
            'tgl_kembali' => now()->addDays(7),
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

    // Memproses peminjaman (checkout)
    public function process(Request $request)
    {
        $keranjang = session()->get('keranjang', []);
        if (empty($keranjang)) {
            return redirect()->route('pinjam.keranjang')->with('error', 'Keranjang Anda kosong.');
        }
        session()->forget('keranjang');

        return redirect()->route('pinjam.keranjang')->with('success', 'Peminjaman berhasil.');
    }

    public function showDetail($id)
    {
        // Ambil data peminjaman berdasarkan ID
        $peminjaman = Peminjaman::with('user', 'detailPeminjaman.buku')->findOrFail($id);

        return view('client.buku.pinjam.detail_peminjaman', compact('peminjaman'));
    }
}
