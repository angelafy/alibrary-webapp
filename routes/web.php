<?php

use App\Http\Controllers\Admin\BukuController;
use App\Http\Controllers\ErrorController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\UserController;

Route::get('/', function () {
    return redirect()->route('home');
});
// Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/buku', [App\Http\Controllers\Client\BukuController::class, 'index'])->name('bukuClient.index');
Route::get('/not-found', [ErrorController::class, 'notFound'])->name('not-found');
Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/pinjam/keranjang', [App\Http\Controllers\Client\KeranjangController::class, 'keranjang'])->name('pinjam.keranjang');
    Route::post('/pinjam/keranjang/add', [App\Http\Controllers\Client\KeranjangController::class, 'store'])->name('keranjang.store');
    Route::delete('/pinjam/keranjang/{id}', [App\Http\Controllers\Client\KeranjangController::class, 'destroy'])->name('keranjang.destroy');

    // Menambahkan buku ke dalam keranjang
    Route::get('/peminjaman', [App\Http\Controllers\Client\PeminjamanController::class, 'index'])->name('pinjam.index');
    Route::get('/peminjaman/{id}/detail', [App\Http\Controllers\Client\PeminjamanController::class, 'showDetail'])->name('peminjaman.detail');
    Route::post('/peminjaman/{id}/kembalikan', [App\Http\Controllers\Client\PeminjamanController::class, 'updateStatusToPendingPengembalian'])->name('peminjaman.kembalikan');
    Route::post('/peminjaman/payment/initiate/{id}', [App\Http\Controllers\Client\PeminjamanController::class, 'initiatePayment'])->name('peminjaman.payment.initiate');
    Route::post('/peminjaman/payment/notification', [App\Http\Controllers\Client\PeminjamanController::class, 'handlePaymentNotification'])->name('peminjaman.payment.notification');
    // Route::post('/peminjaman/payment/callback', [App\Http\Controllers\Client\PeminjamanController::class, 'handlePaymentCallback'])->name('peminjaman.payment-callback');
    Route::post('/peminjaman/payment/status/update/{id}', [App\Http\Controllers\Client\PeminjamanController::class, 'updatePaymentStatus'])->name('payment.updateStatus');



    Route::post('/pinjam/add', [App\Http\Controllers\Client\PeminjamanController::class, 'store'])->name('pinjam.store');

    // Proses peminjaman buku (checkout)
    Route::get('/pinjam/checkout', [App\Http\Controllers\Client\PeminjamanController::class, 'checkout'])->name('pinjam.checkout');
    Route::post('/pinjam/checkout', [App\Http\Controllers\Client\PeminjamanController::class, 'process'])->name('pinjam.process');

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/buku/{id}/show', [App\Http\Controllers\Client\BukuController::class, 'show'])->name('clientBuku.show');
    Route::get('/buku/genre/{genreId}', [App\Http\Controllers\Client\BukuController::class, 'filterByGenre'])->name('bukuClient.filterByGenre');
    // Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
});


/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

    // User List
    Route::get('admin/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
    Route::get('admin/users/users-admin', [App\Http\Controllers\Admin\UserController::class, 'adalahAdmin'])->name('users.adalahAdmin');

    Route::get('admin/buku', [App\Http\Controllers\Admin\BukuController::class, 'getBukuData']);
    Route::get('admin/buku', [App\Http\Controllers\Admin\BukuController::class, 'index'])->name('bukus.index');
    Route::get('admin/buku/{id}/show', [App\Http\Controllers\Admin\BukuController::class, 'show'])->name('bukus.show');
    Route::post('admin/buku', [App\Http\Controllers\Admin\BukuController::class, 'store'])->name('bukus.store');
    Route::get('admin/buku/create', [App\Http\Controllers\Admin\BukuController::class, 'create'])->name('bukus.create');
    Route::get('admin/buku/{id}/edit', [App\Http\Controllers\Admin\BukuController::class, 'edit'])->name('bukus.edit');
    Route::put('admin/buku/{id}', [App\Http\Controllers\Admin\BukuController::class, 'update'])->name('bukus.update');
    Route::get('/admin/buku/excel', [App\Http\Controllers\Admin\BukuController::class, 'excel'])->name('bukus.excel');
    Route::delete('/admin/buku/{id}', [App\Http\Controllers\Admin\BukuController::class, 'destroy'])->name('bukus.destroy');

    // Peminjaman Listr
    Route::get('/admin/peminjaman', [App\Http\Controllers\Admin\PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::get('/admin/peminjaman/permintaan', [App\Http\Controllers\Admin\PeminjamanController::class, 'permintaan'])->name('permintaan.index');
    Route::get('/admin/peminjaman/excel', [App\Http\Controllers\Admin\PeminjamanController::class, 'excel'])->name('peminjaman.excel');
    Route::patch('/admin/peminjaman/{id}/approve', [App\Http\Controllers\Admin\PeminjamanController::class, 'approve'])->name('peminjaman.approve');
    Route::patch('/admin/peminjaman/{id}/return', [App\Http\Controllers\Admin\PeminjamanController::class, 'return'])->name('peminjaman.return');
    Route::patch('/admin/peminjaman/{id}/reject', [App\Http\Controllers\Admin\PeminjamanController::class, 'reject'])->name('peminjaman.reject');
    Route::delete('/admin/peminjaman/{id}', [App\Http\Controllers\Admin\PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');

    /* Penerbit */
    Route::get('/admin/penerbit', [App\Http\Controllers\Admin\PenerbitController::class, 'index'])->name('penerbit.index');
    Route::delete('/admin/penerbit/{id}', [App\Http\Controllers\Admin\PenerbitController::class, 'destroy'])->name('penerbit.destroy');
    Route::get('admin/penerbit/create', [App\Http\Controllers\Admin\PenerbitController::class, 'create'])->name('penerbit.create');
    Route::post('admin/penerbit', [App\Http\Controllers\Admin\PenerbitController::class, 'store'])->name('penerbit.store');
    
    /* Genre */
    Route::get('/admin/genre', [App\Http\Controllers\Admin\GenreController::class, 'index'])->name('genre.index');
    Route::delete('/admin/genre/{id}', [App\Http\Controllers\Admin\GenreController::class, 'destroy'])->name('genre.destroy');

    /* Penulis */
    Route::get('/admin/penulis', [App\Http\Controllers\Admin\PenulisController::class, 'index'])->name('penulis.index');
    Route::delete('/admin/penulis/{id}', [App\Http\Controllers\Admin\PenulisController::class, 'destroy'])->name('penulis.destroy');
    Route::get('/admin/penulis/create', [App\Http\Controllers\Admin\PenulisController::class, 'create'])->name('penulis.create');
    Route::post('/admin/penulis/add', [App\Http\Controllers\Admin\PenulisController::class, 'store'])->name('penulis.store');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:petugas'])->group(function () {

    Route::get('/petugas/home', [HomeController::class, 'petugasHome'])->name('petugas.home');
});


