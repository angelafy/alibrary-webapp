<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Peminjaman;
use Carbon\Carbon;

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
        Peminjaman::create([
            'kode_peminjaman' => 'XK7LPQN3MVRT',
            'user_id' => 3,
            'tgl_pinjam' => now()->subDays(2),
            'tgl_kembali' => now()->addDays(5),
            'tgl_dikembalikan' => null,
            'status' => 2, 
        ]);

        // 2. Completed loan
        Peminjaman::create([
            'kode_peminjaman' => 'WQ9HNBV5KXYZ',
            'user_id' => 3,
            'tgl_pinjam' => now()->subDays(15),
            'tgl_kembali' => now()->subDays(8),
            'tgl_dikembalikan' => now()->subDays(7),
            'status' => 3, 
        ]);

        // 3. Late return
        Peminjaman::create([
            'kode_peminjaman' => 'YT4RSTP8JWNH',
            'user_id' => 3,
            'tgl_pinjam' => Carbon::create(2025, 1, 1), 
            'tgl_kembali' => Carbon::create(2025, 1, 7), 
            'tgl_dikembalikan' => null,
            'status' => 2, 
        ]);

        // 4. Pending approval
        Peminjaman::create([
            'kode_peminjaman' => 'UG6MDEF2QCVB',
            'user_id' => 3,
            'tgl_pinjam' => now(),
            'tgl_kembali' => now()->addDays(7),
            'tgl_dikembalikan' => null,
            'status' => 0, 
        ]);

        // 5. Rejected loan
        Peminjaman::create([
            'kode_peminjaman' => 'ZP1KLTH7BSAX',
            'user_id' => 3,
            'tgl_pinjam' => now()->subDays(5),
            'tgl_kembali' => now()->addDays(2),
            'tgl_dikembalikan' => null,
            'status' => 6,
        ]);
    }
    
}
