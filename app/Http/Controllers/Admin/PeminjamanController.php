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
                    // Menentukan label dan kelas badge berdasarkan status
                    $statusLabels = [
                        0 => ['label' => 'Pending', 'badge' => 'bg-secondary'],
                        1 => ['label' => 'Disetujui', 'badge' => 'bg-success'],
                        2 => ['label' => 'Dipinjam', 'badge' => 'bg-warning'],
                        3 => ['label' => 'Dikembalikan', 'badge' => 'bg-primary'],
                        4 => ['label' => 'Terlambat', 'badge' => 'bg-danger'],
                        5 => ['label' => 'Hilang', 'badge' => 'bg-dark'],
                    ];
                
                    $status = $row->status;
                    $label = $statusLabels[$status]['label'] ?? 'Unknown';
                    $badgeClass = $statusLabels[$status]['badge'] ?? 'bg-default';
            
                    return '<span class="badge ' . $badgeClass . '" style="font-size: 12px; padding: 5px 10px; width: 80px; text-align: center; display: inline-block; border-radius: 5px;">' . $label . '</span>';
                })
                
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
        // Menghitung jumlah berdasarkan status peminjaman
        $tracker = Peminjaman::select('status', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('status')
            ->get();

        // Mendapatkan jumlah total peminjaman
        $total = $tracker->sum('jumlah');

        // Menghitung jumlah berdasarkan status secara terpisah
        $statusCounts = [
            'Pending' => 0,
            'Disetujui' => 0,
            'Dipinjam' => 0,
            'Dikembalikan' => 0,
            'Terlambat' => 0,
            'Hilang' => 0,
        ];

        foreach ($tracker as $item) {
            switch ($item->status) {
                case 0:
                    $statusCounts['Pending'] = $item->jumlah;
                    break;
                case 1:
                    $statusCounts['Disetujui'] = $item->jumlah;
                    break;
                case 2:
                    $statusCounts['Dipinjam'] = $item->jumlah;
                    break;
                case 3:
                    $statusCounts['Dikembalikan'] = $item->jumlah;
                    break;
                case 4:
                    $statusCounts['Terlambat'] = $item->jumlah;
                    break;
                case 5:
                    $statusCounts['Hilang'] = $item->jumlah;
                    break;
            }
        }

        $data['tracker'] = $tracker;
        $data['total'] = $total;
        $data['statusCounts'] = $statusCounts;

        return view('admin.peminjaman.index', $data);
    }

    
}
