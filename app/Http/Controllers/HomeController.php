<?php

namespace App\Http\Controllers;

use App\Models\AdminActivity;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        // Memuat buku dengan relasi penulis, penerbit, dan genre serta melakukan pagination
        $bukus = Buku::with(['penulis', 'penerbit', 'genre'])->get();

        return view('client.index', compact('bukus'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome(): View
    {
       $data['main'] = 'Dashboard';
    
       $userAnyar = \DB::table('users')
           ->where('type', 0)
           ->orderBy('id', 'desc')
           ->limit(5)
           ->get();
    
       $totalBuku = Buku::count();
       $totalPending = Peminjaman::whereIn('status', [0, 6])->count();
       $totalPeminjaman = Peminjaman::count();
       $totalDipinjam = Peminjaman::where('status', 2)->count();
       $totalUsers = User::count();
       $totalAdmin = User::where('type', '>', 0)->count();
    
       $totalUserPeminjam = Peminjaman::select('user_id')
           ->distinct()
           ->count('user_id');
    
       $totalUserPelanggaran = Peminjaman::select('user_id')
           ->where('status', 4)
           ->distinct()
           ->count('user_id');
    
       $data['totalBuku'] = $totalBuku;
       $data['totalPending'] = $totalPending;
       $data['totalPeminjaman'] = $totalPeminjaman;
       $data['totalDipinjam'] = $totalDipinjam;
       $data['totalUsers'] = $totalUsers;
       $data['totalAdmin'] = $totalAdmin;
       $data['userAnyar'] = $userAnyar;
       $data['totalUserPeminjam'] = $totalUserPeminjam;
       $data['totalUserPelanggaran'] = $totalUserPelanggaran;
    
       $data['activities'] = Peminjaman::with(['user', 'detailPeminjaman.buku'])
           ->orderBy('created_at', 'desc')
           ->limit(15)
           ->get()
           ->map(function ($peminjaman) {
               return [
                   'user_name' => $peminjaman->user->name,
                   'user' => $peminjaman->user,
                   'book_titles' => $peminjaman->detailPeminjaman->pluck('buku.title')->join(', '),
                   'status' => $peminjaman->status,
                   'created_at' => $peminjaman->created_at->diffForHumans(),
                   'message' => $this->getActivityMessage($peminjaman->status, $peminjaman->detailPeminjaman->pluck('buku.title')->join(', '))
               ];
           });
    
       $data['adminActivities'] = AdminActivity::with(['admin' => function($query) {
               $query->where('type', '>', 0);
           }])
           ->orderBy('created_at', 'desc')
           ->limit(5)
           ->get()
           ->map(function ($activity) {
               return [
                   'user' => [
                       'name' => $activity->admin->nama,
                       'type' => $activity->admin->type,
                       'avatar' => substr($activity->admin->nama, 0, 2)
                   ],
                   'action' => $activity->action,
                   'description' => $activity->description,
                   'created_at' => $activity->created_at->diffForHumans()
               ];
           });
    
       $data['buku'] = Buku::with(['penulis', 'penerbit', 'genre'])->get();
       $data['chartData'] = $this->getPeminjamanChartData();
    
       return view('admin.index', $data);
    }

    private function getActivityMessage($status, $bookTitles): string
    {
        return match ($status) {
            0 => "meminta pinjam \"$bookTitles\"",
            1 => "disetujui untuk pinjam \"$bookTitles\"",
            2 => "meminjam \"$bookTitles\"",
            3 => "mengembalikan \"$bookTitles\"",
            4 => "telat pengembalian \"$bookTitles\"",
            5 => "menghilangkan \"$bookTitles\"",
            6 => "meminta pengembalian \"$bookTitles\"",
            7 => "ditolak untuk pinjam \"$bookTitles\"",
            default => "unknown activity"
        };
    }
    private function getPeminjamanChartData(): array
    {
        $endDate = Carbon::now();
        $startDate = Carbon::now()->subDays(7); // Kurangi jadi 7 hari untuk tampilan yang lebih rapi

        $dateRange = [];
        for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
            $dateRange[$date->format('Y-m-d')] = 0;
        }

        $peminjaman = Peminjaman::whereBetween('tgl_pinjam', [$startDate, $endDate])
            ->get()
            ->groupBy(function ($item) {
                return $item->tgl_pinjam->format('Y-m-d');
            });

        // Gabungkan data peminjaman dengan range tanggal
        foreach ($peminjaman as $date => $records) {
            $dateRange[$date] = $records->count();
        }

        // Format data untuk chart
        $chartData = [];
        foreach ($dateRange as $date => $count) {
            $chartData[] = [
                'x' => $date,
                'y' => $count
            ];
        }

        return $chartData;
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function petugasHome(): View
    {
        return view('petugas.index');
    }
}
