<?php

use App\Http\Controllers\DestinationController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

// Halaman utama TripMate — index method menampilkan data dari database.
Route::get('/', [DestinationController::class, 'index']);

// Form kontak — simpan pesan baru ke tabel messages.
Route::post('/kontak', [MessageController::class, 'store']);
