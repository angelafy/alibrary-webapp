<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    protected $table = 'denda';
    protected $fillable = ['peminjaman_id', 'jumlah'];
    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class);
    }
}
