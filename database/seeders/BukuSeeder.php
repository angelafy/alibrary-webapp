<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    public function run(): void
    {

        Buku::create([
            'title' => 'Pelangi',
            'author' => 'Gayus Tambunan',
            'publisher' => 'Padang Murah',
            'tahun_terbit' => 2021,
            'deskripsi' => 'Lorem Ipsum Color Dir Sir Amet.',
            'sinopsis' => 'Lorem Ipsum Color Dir Sir Amet.',
            'genre' => 'Criminal',
            'stock' => 5,
        ]);

        Buku::create([
            'title' => 'Lorem Ipsum Color Dir Sir Amet.',
            'author' => 'Lorem Ipsum Color Dir Sir Amet.',
            'publisher' => 'Lorem Ipsum Color Dir Sir Amet.',
            'tahun_terbit' => 2020,
            'deskripsi' => 'A guide to advanced PHP programming techniques.',
            'sinopsis' => 'This book dives deep into advanced PHP concepts.',
            'genre' => 'Test',
            'stock' => 2,
        ]);


    }
}
