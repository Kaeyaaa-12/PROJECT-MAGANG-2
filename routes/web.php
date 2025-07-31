<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AksesorisController;

// Rute untuk Halaman Utama (Landing Page)
Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Rute untuk Halaman Tentang Kami
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang.index');

// Rute untuk Halaman Aksesoris
Route::get('/aksesoris', [AksesorisController::class, 'index'])->name('aksesoris.index');

// Rute untuk Halaman Kostum Pria
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');

// Rute untuk Halaman Aksesoris
Route::get('/aksesoris', [AksesorisController::class, 'index'])->name('aksesoris.index');
Route::get('/aksesoris/{id}', [AksesorisController::class, 'show'])->name('aksesoris.show');

// ADMIN ROUTES
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login']);
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::middleware('admin')->group(function () {
        // --- PERUBAHAN DI SINI ---
        // URL diubah dari '/dashboard' menjadi '/login/dashboard'
        Route::get('/login/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    });
});

require __DIR__.'/auth.php';