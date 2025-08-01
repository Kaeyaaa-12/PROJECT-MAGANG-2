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

    // ROUTE LUPA PASSWORD
    Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
    Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');

    // ROUTE UNTUK RESET PASSWORD (dari link di email)
    Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');
    Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('admin.password.store');


    Route::middleware('admin')->group(function () {
        Route::get('/login/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::resource('/login/dashboard/galeri', GalleryController::class)->names('admin.galeri');
        Route::get('/login/dashboard/produk', [AdminContentController::class, 'produk'])->name('admin.produk');
        Route::get('/login/dashboard/aksesoris', [AdminContentController::class, 'aksesoris'])->name('admin.aksesoris');
        Route::get('/login/dashboard/disewa', [AdminContentController::class, 'disewa'])->name('admin.disewa');
    });
});

require __DIR__.'/auth.php';
