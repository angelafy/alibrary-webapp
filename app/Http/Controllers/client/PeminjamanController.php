<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Buku;
use App\Models\keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    // Menampilkan halaman keranjang peminjaman
    public function keranjang()
    {
        $data['keranjang']  = Keranjang::where('user_id', Auth::id())->with('detailKeranjang.buku')->first();
        $data['totalDetailKeranjang'] = $data['keranjang'] && $data['keranjang']->detailKeranjang ? $data['keranjang']->detailKeranjang->count() : 0;
        
        if (!$data['keranjang'] || $data['keranjang']->detailKeranjang->isEmpty()) {
            return view('client.buku.pinjam.keranjang', ['message' => 'Keranjang Anda kosong.']);
        }
        return view('client.buku.pinjam.keranjang', $data);
    }
    
    
    


    // Menambahkan buku ke dalam keranjang
    public function store(Request $request)
    {
        // Validasi ID buku yang diterima
        $request->validate([
            'buku_id' => 'required|exists:bukus,id', // Validasi jika ID buku ada di tabel 'bukus'
        ]);

        $buku = Buku::find($request->buku_id);

        // Cek apakah buku sudah ada di keranjang
        $existingKeranjang = Keranjang::where('user_id', Auth::id())
            ->where('buku_id', $buku->id)
            ->first();

        if ($existingKeranjang) {
            return response()->json(['message' => 'Buku ini sudah ada di keranjang.'], 400);
        }
        Keranjang::create([
            'user_id' => Auth::id(),
            'buku_id' => $buku->id,
        ]);

        return response()->json(['message' => 'Buku berhasil ditambahkan ke keranjang.']);
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
