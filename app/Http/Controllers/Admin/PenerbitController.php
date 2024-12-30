<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penerbit;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PenerbitController extends Controller
{
    public function index(Request $request)
    {
        $data['main'] = 'Penerbit';
        $data['judul'] = 'Manajemen Penerbit';
        $data['sub_judul'] = 'Data Penerbit';

        if ($request->ajax()) {
            $data = Penerbit::select('id', 'kode_penerbit', 'nama_penerbit', 'alamat', 'email');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('admin.penerbit.action', ['id' => $row->id])->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.penerbit.index', $data);

    }
}
