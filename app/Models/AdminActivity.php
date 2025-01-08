<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminActivity extends Model
{
    protected $fillable = [
        'admin_id',
        'action',
        'description'
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}