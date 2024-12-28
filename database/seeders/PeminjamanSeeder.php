<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Peminjaman;

class PeminjamanSeeder extends Seeder
{
    public function run(): void
    {
        Peminjaman::create([
            'kode_peminjaman' => '22071400001',
            'user_id' => 1, // Admin User
            'tgl_pinjam' => now(),
            'tgl_kembali' => now()->addDays(7), // 7 days loan
            'status' => false,
        ]);

        Peminjaman::create([
            'kode_peminjaman' => '22071600001',
            'user_id' => 2, // Regular User
            'tgl_pinjam' => now(),
            'tgl_kembali' => now()->addDays(14), // 14 days loan
            'status' => false,
        ]);
    }
}
