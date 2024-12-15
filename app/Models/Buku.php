<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $fillable = [
        'title',
        'penulis',
        'penerbit',
        'terbit',
        'deskripsi',
        'sinopsis',
        'genre',
        'stock',
        'gambar_buku',
    ];
}
