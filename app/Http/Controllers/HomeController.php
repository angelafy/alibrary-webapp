<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
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

        // Get peminjaman data for the last 37 days
        $chartData = $this->getPeminjamanChartData();

        $data['chartLabels'] = $chartData['labels'];
        $data['chartSeries'] = $chartData['series'];

        return view('admin.index', $data);
    }

    private function getPeminjamanChartData(): array
    {
        $endDate = Carbon::now();
        $startDate = Carbon::now()->subDays(36);

        $peminjaman = Peminjaman::whereBetween('tgl_pinjam', [$startDate, $endDate])
            ->get()
            ->groupBy(function ($item) {
                return $item->tgl_pinjam->format('Y-m-d');
            });

        $labels = [];
        $data = [];

        for ($date = clone $startDate; $date <= $endDate; $date->addDay()) {
            $dateStr = $date->format('Y-m-d');
            $labels[] = $dateStr;
            $data[] = $peminjaman->get($dateStr)?->count() ?? 0;
        }

        return [
            'labels' => $labels,
            'series' => [
                [
                    'name' => 'Peminjaman',
                    'data' => $data
                ]
            ]
        ];
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
