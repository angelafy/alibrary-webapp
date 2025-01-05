<?php

namespace App\Http\Controllers\admin;

use App\Exports\PeminjamanExport;
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

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('admin.peminjaman.action', ['id' => $row->id])->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $tracker = DB::table('peminjaman')
            ->select('status', DB::raw('count(*) as jumlah'))
            ->groupBy('status')
            ->get();

        $total = $tracker->sum('jumlah');

        return view('admin.peminjaman.index', $data, compact('tracker', 'total'));
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
        return Excel::download(new PeminjamanExport, 'peminjaman.xlsx');
    }

    public function show($id)
    {
        try {
            $data['main'] = 'Peminjaman';
            $data['judul'] = 'Detail Peminjaman';
            $data['sub_judul'] = 'Informasi Peminjaman';
    
            $peminjaman = Peminjaman::with(['user', 'detailPeminjaman.buku.penulis', 'detailPeminjaman.buku.penerbit'])
                ->findOrFail($id);
    
            return view('admin.peminjaman.show', compact('peminjaman', 'data'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data tidak ditemukan: ' . $e->getMessage());
        }
    }

}
