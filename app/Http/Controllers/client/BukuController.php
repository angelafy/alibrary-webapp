<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku; 
use Yajra\DataTables\Facades\DataTables;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        // Data judul untuk tampilan halaman
        $data['judul'] = 'List Buku';

        // Cek apakah permintaan datang dari AJAX (untuk DataTables)
        if ($request->ajax()) {
            // Query untuk mengambil data buku
            $data = Buku::select('id', 'title', 'author', 'publisher', 'tahun_terbit','deskripsi','sinopsis','genre', 'stock');

            // Format data dengan DataTables
            return Datatables::of($data)
                ->addIndexColumn() // Menambahkan kolom index
                ->addColumn('action', function ($row) {
                    // Kolom action untuk tombol detail
                    return view('admin.buku.action', ['id' => $row->id])->render();
                })
                ->rawColumns(['action']) // Render HTML untuk kolom action
                ->make(true);
        }

        // Mengembalikan view dengan data judul
        return view('client.buku.index', $data);
    }
}
