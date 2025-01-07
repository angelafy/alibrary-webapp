<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminActivity extends Model
{
    protected $fillable = [
        'admin_id', 
        'action',
        'description',
        'model_type',
        'model_id'
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id')->where('type', '>', 0);
    }
}