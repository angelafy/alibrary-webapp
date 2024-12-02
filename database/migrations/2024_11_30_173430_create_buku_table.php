<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id(); // Tipe data unsignedBigInteger secara default
            $table->string('title'); // Judul buku
            $table->string('author'); // Penulis buku
            $table->string('publisher')->nullable(); // Penerbit buku
            $table->year('tahun_terbit')->nullable(); // Tahun terbit buku
            $table->text('deskripsi')->nullable(); // Deskripsi buku
            $table->text('sinopsis')->nullable(); // Sinopsis buku
            $table->string('genre')->nullable(); // Genre buku
            $table->integer('stock')->default(1); // Stok buku
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
