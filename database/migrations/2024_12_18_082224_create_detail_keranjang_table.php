<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_keranjang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('keranjang_id')->constrained('keranjang')->onDelete('cascade'); // Relasi ke tabel keranjang
            $table->foreignId('buku_id')->constrained('buku')->onDelete('cascade'); // Relasi ke tabel buku
            $table->integer('jumlah')->default(1); // Jumlah buku dalam keranjang
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_keranjang');
    }
};
