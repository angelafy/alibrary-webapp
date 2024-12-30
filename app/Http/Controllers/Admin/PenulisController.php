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
                ->addColumn('action', function ($row) {
                    return view('admin.penulis.action', ['id' => $row->id])->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.penulis.index', $data);

    }
}
