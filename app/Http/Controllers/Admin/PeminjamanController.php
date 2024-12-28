<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function index(Request $request)
    {
        $data['main'] = 'Peminjaman';
        $data['judul'] = 'Manajemen Peminjaman User';
        $data['sub_judul'] = 'Data Peminjaman';

        if ($request->ajax()) {
            $peminjaman = Peminjaman::with('user')->select([
                'peminjaman.id',
                'peminjaman.kode_peminjaman',
                'peminjaman.user_id',
                'peminjaman.tgl_pinjam',
                'peminjaman.tgl_kembali',
                'peminjaman.status'
            ]);

            return Datatables::of($peminjaman)
                ->addIndexColumn()
                ->addColumn('nama_peminjam', function ($row) {
                    return $row->user ? $row->user->nama : '-';
                })
                ->addColumn('action', function ($row) {
                    return view('admin.buku.action', ['id' => $row->id])->render();
                })
                ->editColumn('tgl_pinjam', function ($row) {
                    return $row->tgl_pinjam ? $row->tgl_pinjam->format('d M Y') : '-';
                })
                ->editColumn('tgl_kembali', function ($row) {
                    return $row->tgl_kembali ? $row->tgl_kembali->format('d M Y') : 'Belum dikembalikan';
                })
                ->editColumn('status', function ($row) {
                    return $row->status ?
                        '<span class="badge bg-success">Dikembalikan</span>' :
                        '<span class="badge bg-warning">Dipinjam</span>';
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
        $tracker = Peminjaman::select('status', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('status')
            ->get();
        $total = $tracker->sum('jumlah');
        $data['tracker'] = $tracker;
        $data['total'] = $total;
        return view('admin.peminjaman.index', $data);
    }
}
