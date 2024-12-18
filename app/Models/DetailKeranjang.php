<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKeranjang extends Model
{
    use HasFactory;
    protected $table = 'detail_keranjang';
    protected $fillable = ['keranjang_id', 'buku_id', 'jumlah'];

    // Relasi ke keranjang
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }

    // Relasi ke Keranjang
    public function keranjang()
    {
        return $this->belongsTo(Keranjang::class, 'keranjang_id');
    }
}
