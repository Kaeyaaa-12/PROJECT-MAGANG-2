<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AksesorisController;

// Rute untuk Halaman Utama (Landing Page)
Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Rute untuk Halaman Tentang Kami
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang.index');

// Rute untuk Halaman Kostum Pria
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');

// Rute untuk Halaman Aksesoris
Route::get('/aksesoris', [AksesorisController::class, 'index'])->name('aksesoris.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
