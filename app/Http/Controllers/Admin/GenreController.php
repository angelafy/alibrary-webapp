<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
class GenreController extends Controller
{
    public function index(Request $request)
    {
        $data['main'] = 'Genre';
        $data['judul'] = 'Manajemen Data Genre';
        $data['sub_judul'] = 'Data Genre';
        if ($request->ajax()) {
            $data = Genre::select('id', 'kode_genre', 'nama_genre', 'deskripsi');
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('deskripsi', function ($row) {
                    return strlen($row->deskripsi) > 50
                        ? substr($row->deskripsi, 0, 50) . '...'
                        : $row->deskripsi;
                })
                ->addColumn('action', function ($row) {
                    return view('admin.genre.action', ['id' => $row->id])->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.genre.index', $data);

    }
    public function destroy($id)
    {
        try {
            $genre = Genre::findOrFail($id);
            $genre->delete();

            return response()->json([
                'success' => 'Data berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Data gagal dihapus: ' . $e->getMessage()
            ], 500);
        }
    }
}
