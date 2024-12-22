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

class PeminjamanController extends Controller
{
    // Menampilkan halaman keranjang peminjaman
    public function keranjang()
    {
        $data = [];

        $data['keranjang'] = Keranjang::where('user_id', Auth::id())
            ->with('detailKeranjang.buku')
            ->first();

        $data['totalDetailKeranjang'] = $data['keranjang'] && $data['keranjang']->detailKeranjang
            ? $data['keranjang']->detailKeranjang->count()
            : 0;

        $data['message'] = !$data['keranjang'] || $data['keranjang']->detailKeranjang->isEmpty()
            ? 'Keranjang Anda kosong.'
            : null;

        return view('client.buku.pinjam.keranjang', $data);
    }

    // Menambahkan buku ke dalam keranjang
    public function store(Request $request)
    {
        // Validasi ID buku yang diterima
        $request->validate([
            'buku_id' => 'required|exists:buku,id', // Pastikan buku ada di tabel 'buku'
        ]);

        // Ambil buku yang dipinjam
        $buku = Buku::find($request->buku_id);

        // Ambil keranjang untuk user yang sedang login
        $keranjang = Keranjang::where('user_id', Auth::id())->first();

        // Cek apakah buku sudah ada di detail_keranjang
        $existingKeranjang = DetailKeranjang::where('keranjang_id', $keranjang->id)
            ->where('buku_id', $buku->id)
            ->first();

        if (!$existingKeranjang) {
            return response()->json(['message' => 'Buku ini tidak ada di keranjang.'], 400);
        }

        // Buat peminjaman baru
        $peminjaman = Peminjaman::create([
            'user_id' => Auth::id(),
            'tgl_pinjam' => now(),
            'tgl_kembali' => now()->addDays(7), // Atur sesuai kebijakan pengembalian
            'status' => false, // Status peminjaman masih belum dikembalikan
        ]);

        // Ambil semua buku dari keranjang untuk dimasukkan ke detail_peminjaman
        $keranjangItems = DetailKeranjang::where('keranjang_id', $keranjang->id)->get();

        // Proses peminjaman dan detail peminjaman
        $detailPeminjamanData = $keranjangItems->map(function ($keranjangItem) use ($peminjaman) {
            return [
                'peminjaman_id' => $peminjaman->id,
                'buku_id' => $keranjangItem->buku_id,
                'jumlah' => $keranjangItem->jumlah, // Anda bisa sesuaikan jumlahnya
                'created_at' => now(),
                'updated_at' => now(),
            ];
        });

        // Batch insert detail peminjaman
        DB::table('detail_peminjaman')->insert($detailPeminjamanData->toArray());

        // Hapus semua data dari detail_keranjang setelah diproses
        DetailKeranjang::where('keranjang_id', $keranjang->id)->delete();
        $keranjang->delete();
        return response()->json(['message' => 'Peminjaman berhasil diproses.']);
    }




    // Menampilkan halaman checkout
    public function checkout()
    {
        // Ambil data keranjang dari session
        $keranjang = session()->get('keranjang', []);

        // Jika keranjang kosong, beri pesan error
        if (empty($keranjang)) {
            return redirect()->route('pinjam.keranjang')->with('error', 'Keranjang Anda kosong.');
        }

        // Tampilkan halaman checkout dengan data keranjang
        return view('client.buku.pinjam.checkout', compact('keranjang'));
    }

    // Memproses peminjaman (checkout)
    public function process(Request $request)
    {
        // Ambil data keranjang dari session
        $keranjang = session()->get('keranjang', []);

        // Jika keranjang kosong, beri pesan error
        if (empty($keranjang)) {
            return redirect()->route('pinjam.keranjang')->with('error', 'Keranjang Anda kosong.');
        }

        // Logika peminjaman bisa ditambahkan di sini, misalnya mengurangi stok buku atau menambah data peminjaman ke database

        // Setelah proses peminjaman, kosongkan keranjang
        session()->forget('keranjang');

        // Redirect dengan pesan sukses
        return redirect()->route('pinjam.keranjang')->with('success', 'Peminjaman berhasil.');
    }
}
