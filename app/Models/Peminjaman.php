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
        'tgl_pengembalian',
        'status',
    ];

    const STATUS_PENDING = 0;
    const STATUS_DISETUJUI = 1;
    const STATUS_DIPINJAM = 2;
    const STATUS_DIKEMBALIKAN = 3;
    const STATUS_TERLAMBAT = 4;
    const STATUS_HILANG = 5;
    const STATUS_PENDING_PENGEMBALIAN = 6;

    public static function getStatusList()
    {
        return [
            self::STATUS_PENDING => 'Pending',
            self::STATUS_DISETUJUI => 'Disetujui',
            self::STATUS_DIPINJAM => 'Dipinjam',
            self::STATUS_DIKEMBALIKAN => 'Dikembalikan',
            self::STATUS_TERLAMBAT => 'Terlambat',
            self::STATUS_HILANG => 'Hilang',
            self::STATUS_PENDING_PENGEMBALIAN => 'Pending Pengembalian',
        ];
    }

    protected $casts = [
        'tgl_pinjam' => 'datetime',
        'tgl_kembali' => 'datetime',
        'tgl_pengembalian' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }

    public function denda()
    {
        return $this->hasOne(Denda::class);
    }

    public function detailPeminjaman()
    {
        return $this->hasMany(DetailPeminjaman::class, 'peminjaman_id');
    }
}