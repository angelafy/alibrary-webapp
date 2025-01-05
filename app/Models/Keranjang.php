<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keranjang extends Model
{
    protected $table = 'keranjang';
    use HasFactory;

    protected $fillable = ['user_id', 'buku_id'];

    // Relasi dengan Buku
    public function detailKeranjang()
    {
        return $this->hasMany(DetailKeranjang::class, 'keranjang_id');
    }

    

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }

    
    // Relasi dengan DetailKeranjang

}
