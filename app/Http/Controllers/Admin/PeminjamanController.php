<?php

namespace App\Http\Controllers\admin;

use App\Exports\PermintaanExport;
use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

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
                'peminjaman.tgl_dikembalikan',
                'peminjaman.status'
            ]);

            return Datatables::of($peminjaman)
                ->addIndexColumn()
                ->addColumn('nama_peminjam', function ($row) {
                    return $row->user ? $row->user->nama : '-';
                })
                ->addColumn('action', function ($row) {
                    return view('admin.peminjaman.action', ['id' => $row->id])->render();
                })
                ->editColumn('tgl_pinjam', function ($row) {
                    return $row->tgl_pinjam ? $row->tgl_pinjam->format('d M Y') : '-';
                })
                ->editColumn('tgl_kembali', function ($row) {
                    return $row->tgl_kembali ? $row->tgl_kembali->format('d M Y') : 'Belum dikembalikan';
                })
                ->editColumn('status', function ($row) {
                    $statusLabels = [
                        0 => ['label' => 'Persetujuan', 'badge' => 'bg-secondary'],
                        1 => ['label' => 'Disetujui', 'badge' => 'bg-success'],
                        2 => ['label' => 'Dipinjam', 'badge' => 'bg-warning'],
                        3 => ['label' => 'Dikembalikan', 'badge' => 'bg-primary'],
                        4 => ['label' => 'Terlambat', 'badge' => 'bg-danger'],
                        5 => ['label' => 'Hilang', 'badge' => 'bg-dark'],
                        6 => ['label' => 'Pengembalian', 'badge' => 'bg-dark'],
                    ];

                    $status = $row->status;
                    $label = $statusLabels[$status]['label'] ?? 'Unknown';
                    $badgeClass = $statusLabels[$status]['badge'] ?? 'bg-default';

                    return '<span class="badge ' . $badgeClass . '" style="font-size: 12px; padding: 5px 10px; width: 80px; text-align: center; display: inline-block; border-radius: 5px;">' . $label . '</span>';
                })

                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        $tracker = Peminjaman::select('status', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('status')
            ->get();

        $total = $tracker->sum('jumlah');
        $statusCounts = [
            'Pending Persetujuan' => 0,
            'Disetujui' => 0,
            'Dipinjam' => 0,
            'Dikembalikan' => 0,
            'Terlambat' => 0,
            'Hilang' => 0,
            'Pending Pengembalian' => 0,
            'Ditolak' => 0,
        ];

        foreach ($tracker as $item) {
            switch ($item->status) {
                case 0:
                    $statusCounts['Pending Persetujuan'] = $item->jumlah;
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
                case 6:
                    $statusCounts['Pending Pengembalian'] = $item->jumlah;
                    break;
                case 7:
                    $statusCounts['Ditolak'] = $item->jumlah;
                    break;
            }
        }

        $data['tracker'] = $tracker;
        $data['total'] = $total;
        $data['statusCounts'] = $statusCounts;

        return view('admin.peminjaman.index', $data);
    }
    public function destroy($id)
    {
        try {
            $peminjaman = Peminjaman::findOrFail($id);
            $peminjaman->delete();

            return response()->json([
                'success' => 'Data berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Data gagal dihapus: ' . $e->getMessage()
            ], 500);
        }
    }

    public function approve($id)
    {
        try {
            date_default_timezone_set('Asia/Jakarta');
            $peminjaman = Peminjaman::findOrFail($id);

            if ($peminjaman->status == 0) {
                $peminjaman->status = 2;
                $peminjaman->tgl_pinjam = now();
                $peminjaman->save();

                return redirect()->back()->with('success', 'Peminjaman telah disetujui');
            } else if ($peminjaman->status == 6) {
                $peminjaman->status = 3;
                $peminjaman->tgl_dikembalikan = now();
                $peminjaman->save();

                return redirect()->back()->with('success', 'Pengembalian telah disetujui');
            }

            return redirect()->back()->with('error', 'Status peminjaman tidak valid');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    public function return($id)
    {
        try {
            $peminjaman = Peminjaman::findOrFail($id);

            if ($peminjaman->status == 6) {
                $peminjaman->status = 3;
                $peminjaman->tgl_dikembalikan = now();
                $peminjaman->save();

                return redirect()->back()->with('success', 'Pengembalian telah dikonfirmasi dan tanggal pengembalian telah diperbarui.');
            }

            return redirect()->back()->with('error', 'Status peminjaman tidak valid untuk pengembalian.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function permintaan(Request $request)
    {
        if ($request->ajax()) {
            $query = Peminjaman::with(['user', 'detailPeminjaman.buku']);
            $recordsTotal = $query->count();
            if ($request->has('search') && !empty($request->search['value'])) {
                $searchValue = $request->search['value'];
                $query->where(function ($q) use ($searchValue) {
                    $q->where('kode_peminjaman', 'like', "%{$searchValue}%")
                        ->orWhereHas('user', function ($q) use ($searchValue) {
                            $q->where('nama', 'like', "%{$searchValue}%");
                        });
                });
            }

            $recordsFiltered = $query->count();
            if ($request->has('order')) {
                $columnIndex = $request->order[0]['column'];
                $columnName = $request->columns[$columnIndex]['name'];
                $columnDirection = $request->order[0]['dir'];

                if ($columnName === 'user.name') {
                    $query->join('users', 'peminjaman.user_id', '=', 'users.id')
                        ->orderBy('users.name', $columnDirection)
                        ->select('peminjaman.*');
                } else {
                    $query->orderBy($columnName, $columnDirection);
                }
            } else {
                $query->latest();
            }
            $limit = $request->length ?? 10;
            $start = $request->start ?? 0;
            $data = $query->take($limit)->skip($start)->get();


            return response()->json([
                'draw' => $request->draw,
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsFiltered,
                'data' => $data
            ]);
        }

        $tracker = DB::table('peminjaman')
            ->select('status', DB::raw('count(*) as jumlah'))
            ->groupBy('status')
            ->get();

        $total = $tracker->sum('jumlah');

        return view('admin.permintaan.index', compact('tracker', 'total'));
    }

    // GAWE REJECT
    public function reject($id)
    {
        try {
            $peminjaman = Peminjaman::findOrFail($id);
            $allowedStatus = [0, 6];

            if (!in_array($peminjaman->status, $allowedStatus)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Status peminjaman tidak valid untuk ditolak'
                ], 422);
            }
            $peminjaman->status = 7;
            if ($peminjaman->status == 0) {
                $peminjaman->keterangan = 'Peminjaman ditolak';
            } else if ($peminjaman->status == 6) {
                $peminjaman->keterangan = 'Pengembalian ditolak';
            }

            $peminjaman->save();

            $message = $peminjaman->status == 6 ? 'Pengembalian berhasil ditolak' : 'Peminjaman berhasil ditolak';

            return response()->json([
                'success' => true,
                'message' => $message
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function excel()
    {
        return Excel::download(new PermintaanExport, 'permintaan.xlsx');
    }

}
