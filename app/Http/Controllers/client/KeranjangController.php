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


class KeranjangController extends Controller
{
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

    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required|exists:buku,id',
        ]);
    
        $buku = Buku::find($request->buku_id);
    
        // Cek apakah user sudah memiliki keranjang
        $keranjang = Keranjang::firstOrCreate(
            ['user_id' => Auth::id()],
            ['created_at' => now(), 'updated_at' => now()]
        );
    
        // Cek apakah buku sudah ada di keranjang
        $existingKeranjang = DetailKeranjang::where('keranjang_id', $keranjang->id)
            ->where('buku_id', $buku->id)
            ->first();
    
        if ($existingKeranjang) {
            return response()->json([
                'status' => 'error',
                'message' => 'Buku sudah ada di keranjang.',
            ], 400);
        }
    
        // Tambahkan buku ke detail keranjang
        DetailKeranjang::create([
            'keranjang_id' => $keranjang->id,
            'buku_id' => $buku->id,
            'jumlah' => 1,
        ]);
    
        return response()->json([
            'status' => 'success',
            'message' => 'Buku berhasil ditambahkan ke keranjang.',
        ]);
    }
    

}
