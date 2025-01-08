<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Traits\LogsAdminActivity;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
class GenreController extends Controller
{
    use LogsAdminActivity;
    public function index(Request $request)
    {
        $data['main'] = 'Genre';
        $data['judul'] = 'Manajemen Data Genre';
        $data['sub_judul'] = 'Data Genre';
        if ($request->ajax()) {
            $data = Genre::select('id', 'kode_genre', 'nama_genre', 'deskripsi');
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('deskripsi', function ($row) {
                    return strlen($row->deskripsi) > 50
                        ? substr($row->deskripsi, 0, 50) . '...'
                        : $row->deskripsi;
                })
                ->addColumn('action', function ($row) {
                    return view('admin.genre.action', ['id' => $row->id])->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.genre.index', $data);

    }
    public function destroy($id)
    {
        try {
            $genre = Genre::findOrFail($id);
            $genre->delete();

            $this->logAdminActivity(
                'delete_genre',
                '[' . $genre->kode_genre . ']' . ' ' . $genre->nama_genre
            );
            return response()->json([
                'success' => 'Data berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Data gagal dihapus: ' . $e->getMessage()
            ], 500);
        }
    }


    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'kode_genre' => 'required|string|max:255',
            'nama_genre' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:100',
        ]);
        /* Gawe store create */
        $genre = Genre::create([
            'kode_genre' => $request->kode_genre,
            'nama_genre' => $request->nama_genre,
            'deskripsi' => $request->deskripsi,

        ]);
        $this->logAdminActivity(
            'create_genre',
            '[' . $genre->kode_genre . ']' . ' ' . $genre->nama_genre
        );
        // Redirect to the supplier list with a success message
        return redirect()->route('genre.index')
            ->with('success', 'Genre berhasil ditambahkan.');
    }
    public function create()
    {
        $data['main'] = 'Genre';
        $data['judul'] = 'Manajemen Data Genre';
        $data['sub_judul'] = 'Data Genre';
        return view('admin.genre.create', $data);
    }

    public function edit($id)
    {
        $data['main'] = 'Genre';
        $data['judul'] = 'Manajemen Data Genre';
        $data['sub_judul'] = 'Data Genre';
        $data['genre'] = Genre::findOrFail($id);
        return view('admin.genre.edit', $data);
    }

    public function update(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'kode_genre' => 'required|string|max:255',
            'nama_genre' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:100',
        ]);

        $genre = Genre::findOrFail($id);
        $genre->update([
            'kode_genre' => $request->kode_genre,
            'nama_genre' => $request->nama_genre,
            'deskripsi' => $request->deskripsi,
        ]);
        $this->logAdminActivity(
            'update_genre',
            '[' . $genre->kode_genre . ']' . ' ' . $genre->nama_genre
        );
        return redirect()->route('genre.index')
            ->with('success', 'Genre berhasil diperbarui.');
    }

    public function show($id)
    {
        $data['main'] = 'Genre';
        $data['judul'] = 'Detail Genre';
        $data['sub_judul'] = 'Informasi Genre';
        $data['genre'] = Genre::findOrFail($id);
        return view('admin.genre.show', $data);
    }
}
