<?php

namespace App\Http\Controllers\admin;

use App\Exports\PeminjamanExport;
use App\Exports\PermintaanExport;
use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
    
            // Handle search
            if ($request->has('search') && !empty($request->search['value'])) {
                $searchValue = $request->search['value'];
                $query->where(function ($q) use ($searchValue) {
                    $q->where('kode_peminjaman', 'like', "%{$searchValue}%")
                        ->orWhereHas('user', function ($q) use ($searchValue) {
                            $q->where('nama', 'like', "%{$searchValue}%");
                        });
                });
            }
    
            $recordsTotal = Peminjaman::count();
            $recordsFiltered = $query->count();
    
            // Handle ordering
            if ($request->has('order')) {
                $columnIndex = $request->order[0]['column'];
                $columnName = $request->columns[$columnIndex]['data'];
                $columnDirection = $request->order[0]['dir'];
                
                if ($columnName === 'user.nama') {
                    $query->join('users', 'peminjaman.user_id', '=', 'users.id')
                        ->orderBy('users.nama', $columnDirection)
                        ->select('peminjaman.*');
                } else if ($columnName !== 'action' && $columnName !== null) {
                    $query->orderBy($columnName, $columnDirection);
                }
            }
    
            // Handle pagination
            $start = $request->start;
            $length = $request->length;
            $data = $query->skip($start)->take($length)->get();
    
            // Tambahkan action button untuk setiap row
            $data = $data->map(function ($item) {
                $item->action = view('admin.peminjaman.action', ['id' => $item->id])->render();
                return $item;
            });
    
            return response()->json([
                'draw' => intval($request->draw),
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


    public function edit($id)
    {
        try {
            $data['main'] = 'Peminjaman';
            $data['judul'] = 'Edit Peminjaman';
            $data['sub_judul'] = 'Form Edit Peminjaman';

            $peminjaman = Peminjaman::with(['user', 'detailPeminjaman.buku'])->findOrFail($id);
            $users = User::all();

            return view('admin.peminjaman.edit', compact('peminjaman', 'users', 'data'));
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Data tidak ditemukan: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $peminjaman = Peminjaman::findOrFail($id);

            $request->validate([
                'kode_peminjaman' => 'required|unique:peminjaman,kode_peminjaman,' . $id,
                'user_id' => 'required|exists:users,id',
                'tgl_pinjam' => 'required|date',
                'tgl_kembali' => 'required|date|after:tgl_pinjam',
                'status' => 'required|integer|between:0,7'
            ]);

            $peminjaman->update([
                'kode_peminjaman' => $request->kode_peminjaman,
                'user_id' => $request->user_id,
                'tgl_pinjam' => $request->tgl_pinjam,
                'tgl_kembali' => $request->tgl_kembali,
                'status' => $request->status,
                'keterangan' => $request->keterangan
            ]);

            return redirect()
                ->route('peminjaman.index')
                ->with('success', 'Data peminjaman berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    public function approve($id)
    {
        DB::beginTransaction();
        try {
            $peminjaman = Peminjaman::with(['detailPeminjaman.buku'])
                ->findOrFail($id);

            Log::info('Processing peminjaman:', [
                'id' => $id,
                'status' => $peminjaman->status,
                'details' => $peminjaman->detailPeminjaman
            ]);
            if ($peminjaman->status == 0) {
                $borrowedBooks = DetailPeminjaman::where('peminjaman_id', $peminjaman->id)
                    ->with('buku')
                    ->get();

                if ($borrowedBooks->isEmpty()) {
                    throw new \Exception('Tidak ada buku yang akan dipinjam');
                }

                foreach ($borrowedBooks as $detail) {
                    $buku = Buku::find($detail->buku_id);

                    if (!$buku) {
                        throw new \Exception("Buku tidak ditemukan untuk detail peminjaman ID: {$detail->id}");
                    }

                    if ($buku->stock < $detail->jumlah) {
                        throw new \Exception("Stok buku '{$buku->judul}' tidak mencukupi (Tersedia: {$buku->stok}, Diminta: {$detail->jumlah})");
                    }

                    $buku->stock -= $detail->jumlah;
                    $buku->save();
                }

                $peminjaman->status = 2;
                $peminjaman->tgl_pinjam = now();

                $message = 'Peminjaman berhasil disetujui dan stok buku telah diperbarui';

            } else if ($peminjaman->status == 6) {
                foreach ($peminjaman->detailPeminjaman as $detail) {
                    $buku = Buku::find($detail->buku_id);

                    if (!$buku) {
                        throw new \Exception("Buku tidak ditemukan untuk detail peminjaman ID: {$detail->id}");
                    }
                    $buku->stock += $detail->jumlah;
                    $buku->save();
                }

                $peminjaman->status = 3;
                $peminjaman->tgl_kembali = now();

                $message = 'Pengembalian berhasil disetujui dan stok buku telah diperbarui';

            } else {
                throw new \Exception('Status peminjaman tidak valid');
            }

            $peminjaman->save();
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => $message
            ]);

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Approval error:', [
                'peminjaman_id' => $id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Gagal menyetujui peminjaman: ' . $e->getMessage()
            ], 400);
        }
    }
    public function return($id)
    {
        DB::beginTransaction();
        try {
            $peminjaman = Peminjaman::with('detailPeminjaman.buku')->findOrFail($id);
            if ($peminjaman->status !== 2) {
                throw new \Exception('Status peminjaman tidak valid untuk pengembalian');
            }
            foreach ($peminjaman->detailPeminjaman as $detail) {
                $buku = $detail->buku;

                $buku->stock += $detail->jumlah;
                $buku->save();
            }

            $peminjaman->status = 3;
            $peminjaman->tgl_kembali = now();
            $peminjaman->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Pengembalian berhasil diproses dan stok buku telah diperbarui'
            ]);

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Gagal memproses pengembalian: ' . $e->getMessage()
            ], 400);
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
