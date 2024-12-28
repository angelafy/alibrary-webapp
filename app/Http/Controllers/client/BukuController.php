<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Penulis;
use Yajra\DataTables\Facades\DataTables;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $sort = $request->input('sort', 'latest'); 
        $genreId = $request->input('genre'); 

        $genres = Genre::all();

        $bukus = Buku::with(['penulis', 'penerbit', 'genre']) 
            ->where('title', 'like', '%' . $keyword . '%')
            ->orWhereHas('penulis', function ($query) use ($keyword) {
                $query->where('nama_author', 'like', '%' . $keyword . '%');
            })
            ->orWhere('terbit', 'like', '%' . $keyword . '%');

        // Filter genre
        if ($genreId) {
            $bukus = $bukus->where('genre_id', $genreId); 
        }

        if ($sort == 'latest') {
            $bukus = $bukus->orderBy('created_at', 'desc');
        } elseif ($sort == 'oldest') {
            $bukus = $bukus->orderBy('created_at', 'asc');
        }

        $bukus = $bukus->paginate(12);

        return view('client.buku.index', compact('bukus', 'genres'));
    }


    public function filterByGenre($genreId)
    {
        $bukus = Buku::where('genre_id', $genreId)->paginate(12);
        $genres = Genre::all();

        return view('client.buku.index', compact('bukus', 'genres'));
    }


    public function show($id)
    {
        $buku = Buku::with(['penulis', 'penerbit', 'genre'])->find($id);
        return view('client.buku.detail', compact('buku'));
    }

}
