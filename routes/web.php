<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AksesorisController;
use App\Http\Controllers\Admin\AdminContentController;
use App\Http\Controllers\Admin\GalleryController;

// Rute Halaman Publik
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang.index');
Route::get('/aksesoris', [AksesorisController::class, 'index'])->name('aksesoris.index');
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');
Route::get('/aksesoris/{id}', [AksesorisController::class, 'show'])->name('aksesoris.show');


// =======================================================
// RUTE ADMIN
// =======================================================
Route::prefix('admin')->name('admin.')->group(function () {
    // Rute untuk login, logout, dan lupa password (di luar middleware 'admin')
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminController::class, 'login']);
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.store');

    // Rute yang memerlukan login admin
    Route::middleware('admin')->group(function () {
        // --- PERBAIKAN DI SINI ---
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::resource('/galeri', GalleryController::class)->names('galeri');
        Route::get('/produk', [AdminContentController::class, 'produk'])->name('produk');
        Route::get('/aksesoris', [AdminContentController::class, 'aksesoris'])->name('aksesoris');
        Route::get('/disewa', [AdminContentController::class, 'disewa'])->name('disewa');
    });
});

require __DIR__.'/auth.php';