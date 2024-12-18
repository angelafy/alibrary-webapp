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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi ke tabel users
            $table->foreignId('buku_id')->constrained('buku')->onDelete('cascade'); // Relasi ke tabel buku
            $table->date('tgl_pinjam'); // Tanggal peminjaman
            $table->date('tgl_kembali'); // Tanggal pengembalian
            $table->boolean('status')->default(false); // Status pengembalian
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};