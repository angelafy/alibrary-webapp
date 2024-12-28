<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
        return view(view: 'admin.index');
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
