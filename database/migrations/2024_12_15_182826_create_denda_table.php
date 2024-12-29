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
        Schema::create('denda', function (Blueprint $table) {
            $table->id();
            // Relasi foreign key ke tabel `peminjaman` secara eksplisit
            $table->foreignId('peminjaman_id')->constrained('peminjaman')->onDelete('cascade');
            $table->decimal('jumlah', 8, 2);
            $table->string('order_id')->nullable();
            $table->timestamp('tanggal_pembayaran')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamp('pending_payment_until')->nullable();
            $table->string('pending_payment_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('denda');
    }
};
