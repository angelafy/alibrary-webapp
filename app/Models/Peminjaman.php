<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $fillable = [
        'kode_peminjaman',
        'user_id',
        'tgl_pinjam',
        'tgl_kembali',
        'status',
    ];

    protected $casts = [
        'tgl_pinjam' => 'datetime',
        'tgl_kembali' => 'datetime',
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function buku() {
        return $this->belongsTo(Buku::class);
    }

    public function denda() {
        return $this->hasOne(Denda::class);


    }
    public function detailPeminjaman()
    {
        return $this->hasMany(DetailPeminjaman::class, 'peminjaman_id');
    }

}
