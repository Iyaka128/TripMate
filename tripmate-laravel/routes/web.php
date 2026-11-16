<?php

use App\Http\Controllers\DestinationController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

// Halaman utama TripMate
Route::get('/', [DestinationController::class, 'index']);

// Form kontak
Route::post('/kontak', [MessageController::class, 'store']);

// Pengelolaan destinasi
Route::prefix('admin')->name('admin.')->group(function () {

    // Menampilkan seluruh destinasi
    Route::get('/destinations', [DestinationController::class, 'manageIndex'])
        ->name('destinations.index');

    // Menampilkan form tambah destinasi
    Route::get('/destinations/create', [DestinationController::class, 'create'])
        ->name('destinations.create');

    // Menyimpan destinasi baru
    Route::post('/destinations', [DestinationController::class, 'store'])
        ->name('destinations.store');

    // Menampilkan form edit destinasi
    Route::get('/destinations/{destination}/edit', [DestinationController::class, 'edit'])
        ->name('destinations.edit');

    // Memperbarui destinasi
    Route::put('/destinations/{destination}', [DestinationController::class, 'update'])
        ->name('destinations.update');

    // Menghapus destinasi
    Route::delete('/destinations/{destination}', [DestinationController::class, 'destroy'])
        ->name('destinations.destroy');
});
