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
    Route::get('admin/buku/{id}/show', [App\Http\Controllers\Client\BukuController::class, 'show'])->name('clientBuku.show');
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

    // Supplier
    Route::get('admin/suppliers', [App\Http\Controllers\Admin\SupplierController::class, 'index'])->name('suppliers.index');
    Route::get('admin/suppliers/create', [App\Http\Controllers\Admin\SupplierController::class, 'create'])->name('suppliers.create');
    Route::post('admin/suppliers', [App\Http\Controllers\Admin\SupplierController::class, 'store'])->name('suppliers.store');
    Route::get('admin/suppliers/{id}/show', [App\Http\Controllers\Admin\SupplierController::class, 'show'])->name('suppliers.show');
    Route::get('admin/suppliers/{id}/edit', [App\Http\Controllers\Admin\SupplierController::class, 'edit'])->name('suppliers.edit');
    Route::put('admin/suppliers/{id}', [App\Http\Controllers\Admin\SupplierController::class, 'update'])->name('suppliers.update');
    Route::delete('admin/suppliers/{id}', [App\Http\Controllers\Admin\SupplierController::class, 'destroy'])->name('suppliers.destroy');

    // User List
    Route::get('admin/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
    Route::get('admin/users/users-admin', [App\Http\Controllers\Admin\UserController::class, 'adalahAdmin'])->name('users.adalahAdmin');

    Route::get('admin/buku', [App\Http\Controllers\Admin\BukuController::class, 'getBukuData']);
    Route::get('admin/buku', [App\Http\Controllers\Admin\BukuController::class, 'index'])->name('bukus.index');
    Route::post('admin/buku', [App\Http\Controllers\Admin\BukuController::class, 'store'])->name('bukus.store');
    Route::get('admin/buku/create', [App\Http\Controllers\Admin\BukuController::class, 'create'])->name('bukus.create');
    Route::put('admin/buku/{id}', [App\Http\Controllers\Admin\BukuController::class, 'update'])->name('bukus.update');
    Route::get('/admin/buku/excel', [App\Http\Controllers\Admin\BukuController::class, 'excel'])->name('bukus.excel');

    // Peminjaman Listr
    Route::get('/admin/peminjaman', [App\Http\Controllers\Admin\PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::get('/admin/peminjaman/permintaan', [App\Http\Controllers\Admin\PeminjamanController::class, 'permintaan'])->name('permintaan.index');
    Route::get('/admin/peminjaman/permintaan/excel', [App\Http\Controllers\Admin\PeminjamanController::class, 'excel'])->name('permintaan.excel');
    Route::patch('/admin/peminjaman/{id}/approve', [App\Http\Controllers\Admin\PeminjamanController::class, 'approve'])->name('peminjaman.approve');
    Route::patch('/admin/peminjaman/{id}/return', [App\Http\Controllers\Admin\PeminjamanController::class, 'return'])->name('peminjaman.return');
    Route::patch('/admin/peminjaman/{id}/reject', [App\Http\Controllers\Admin\PeminjamanController::class, 'reject'])->name('peminjaman.reject');
    Route::delete('/admin//peminjaman/{id}', [App\Http\Controllers\Admin\PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');

    // Route::get('/admin/buku', [BukuController::class, 'index'])->name('bukus.index');

    // detail buku

});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:petugas'])->group(function () {

    Route::get('/petugas/home', [HomeController::class, 'petugasHome'])->name('petugas.home');
});


