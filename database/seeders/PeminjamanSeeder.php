<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Peminjaman;

class PeminjamanSeeder extends Seeder
{
    public function run(): void
    {
        Peminjaman::create([
            'kode_peminjaman' => 'N9EMGTM91FYQ',
            'user_id' => 1, 
            'tgl_pinjam' => now(),
            'tgl_kembali' => now()->addDays(7), 
            'tgl_dikembalikan' => null,
            'status' => false,
        ]);

        Peminjaman::create([
            'kode_peminjaman' => 'LZFAEFE4FOQT',
            'user_id' => 2, 
            'tgl_pinjam' => now(),
            'tgl_kembali' => now()->addDays(14), 
            'tgl_dikembalikan' => null, 
            'status' => false,
        ]);
    }
}
