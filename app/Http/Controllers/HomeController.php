<?php

namespace App\Http\Controllers;

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
    ->where('type', 0) // Filter hanya user dengan type = 0
    ->orderBy('id', 'desc') // Urutkan berdasarkan ID dari yang terbaru
    ->limit(5) // Batasi hasil maksimal 5 user
    ->get();


    $totalBuku = Buku::count();
    
    // Hitung total peminjaman pending (status 2 atau 6)
    $totalPending = Peminjaman::whereIn('status', [0, 6])->count();
    
    // Hitung total semua peminjaman
    $totalPeminjaman = Peminjaman::count();
    
    // Hitung total peminjaman yang sedang dipinjam (status 2)
    $totalDipinjam = Peminjaman::where('status', 2)->count();
    
    // Hitung total users dan admin
    $totalUsers = User::count();
    $totalAdmin = User::where('type', '>', 0)->count();
    
    // Tambahkan ke data array
    $data['totalBuku'] = $totalBuku;
    $data['totalPending'] = $totalPending;
    $data['totalPeminjaman'] = $totalPeminjaman;
    $data['totalDipinjam'] = $totalDipinjam;
    $data['totalUsers'] = $totalUsers;
    $data['totalAdmin'] = $totalAdmin;
    $data['userAnyar'] = $userAnyar;

    $data['buku'] = Buku::with(['penulis', 'penerbit', 'genre'])->get();
    $data['chartData'] = $this->getPeminjamanChartData();
    
    return view('admin.index', $data);
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
