<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    protected $table = 'denda';
    protected $fillable = [
        'peminjaman_id', 
        'jumlah',
        'status',
        'tanggal_pembayaran',
        'order_id',
        'pending_payment_id',
        'pending_payment_until'
    ];

    protected $casts = [
        'status' => 'boolean',
        'tanggal_pembayaran' => 'datetime',
        'pending_payment_until' => 'datetime'
    ];

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class);
    }
}