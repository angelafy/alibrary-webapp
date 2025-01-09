<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailPeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('detail_peminjaman')->insert([
            [
                'peminjaman_id' => 1, // Pastikan peminjaman_id sesuai dengan data di tabel peminjaman
                'buku_id' => 1, // Pastikan buku_id sesuai dengan data di tabel buku
                'jumlah' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 1,
                'buku_id' => 2,
                'jumlah' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 2,
                'buku_id' => 3,
                'jumlah' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 3,
                'buku_id' => 5,
                'jumlah' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 4,
                'buku_id' => 8,
                'jumlah' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 5,
                'buku_id' => 9,
                'jumlah' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 6,
                'buku_id' => 11,
                'jumlah' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 7,
                'buku_id' => 3,
                'jumlah' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
