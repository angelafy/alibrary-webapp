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
    public function destroy($id)
    {
        try {
            $penerbit = Penerbit::findOrFail($id);
            $penerbit->delete();

            return response()->json([
                'success' => 'Data berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Data gagal dihapus: ' . $e->getMessage()
            ], 500);
        }
    }

    /* store penerbit */
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'kode_penerbit' => 'required|string|max:255',
            'nama_penerbit' => 'required|string|max:255',
            'alamat' => 'required|string|max:100',
            'email' => 'required|string|max:255',
        ]);
        /* Gawe store create */
        Penerbit::create([
            'kode_penerbit' => $request->kode_penerbit,
            'nama_penerbit' => $request->nama_penerbit,
            'alamat' => $request->alamat,
            'email' => $request->email,

        ]);

        // Redirect to the supplier list with a success message
        return redirect()->route('penulis.index')
            ->with('success', 'Penerbit berhasil ditambahkan.');
    }
    public function create()
    {
        $data['main'] = 'Penerbt';
        $data['judul'] = 'Manajemen Data Penerbit';
        $data['sub_judul'] = 'Data Penerbit';
        return view('admin.penerbit.create', $data);
    }
}
