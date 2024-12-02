<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku'; // Nama tabel
    protected $fillable = [
        'title',
        'author',
        'publisher',
        'tahun_terbit',
        'deskripsi',
        'sinopsis',
        'genre',
        'stock',
    ];
}
