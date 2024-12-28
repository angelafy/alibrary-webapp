<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Denda;

class DendaSeeder extends Seeder
{
    public function run(): void
    {
        Denda::create([
            'peminjaman_id' => 1, 
            'jumlah' => 10000,
        ]);

        Denda::create([
            'peminjaman_id' => 2, 
            'jumlah' => 50000, 
        ]);
    }
}
