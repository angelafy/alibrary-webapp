<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Penulis;
use Yajra\DataTables\Facades\DataTables;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        // Memuat buku dengan relasi penulis, penerbit, dan genre serta melakukan pagination
        $bukus = Buku::with(['penulis', 'penerbit', 'genre'])->paginate(12);  // Menampilkan 12 buku per halaman

        return view('client.buku.index', compact('bukus'));
    }
    public function show($id)
    {
        // Mencari buku berdasarkan ID dengan relasi penulis, penerbit, dan genre
        $buku = Buku::with(['penulis', 'penerbit', 'genre'])->find($id);

        // Menampilkan view dengan data buku
        return view('client.buku.detail', compact('buku'));
    }
}
