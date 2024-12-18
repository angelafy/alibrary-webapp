<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailKeranjangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('detail_keranjang')->insert([
            [
                'keranjang_id' => 1, // Pastikan keranjang_id sesuai dengan data di tabel keranjang
                'buku_id' => 1, // Pastikan buku_id sesuai dengan data di tabel buku
                'jumlah' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'keranjang_id' => 1,
                'buku_id' => 2,
                'jumlah' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'keranjang_id' => 2,
                'buku_id' => 3,
                'jumlah' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
