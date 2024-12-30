<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Penulis;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PenulisController extends Controller
{
    public function index(Request $request)
    {
        $data['main'] = 'Penulis';
        $data['judul'] = 'Manajemen Data Penulis';
        $data['sub_judul'] = 'Data Penulis';

        if ($request->ajax()) {
            $data = Penulis::select('id', 'kode_author', 'nama_author', 'bio');
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('bio', function ($row) {
                    return strlen($row->bio) > 50
                        ? substr($row->bio, 0, 50) . '...'
                        : $row->bio;
                })
                ->addColumn('action', function ($row) {
                    return view('admin.penulis.action', ['id' => $row->id])->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.penulis.index', $data);
    }
    public function destroy($id)
    {
        try {
            $penulis = Penulis::findOrFail($id);
            $penulis->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dihapus'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data gagal dihapus: ' . $e->getMessage()
            ], 500);
        }
    }
}
