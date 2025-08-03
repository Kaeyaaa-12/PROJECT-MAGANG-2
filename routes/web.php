<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\AksesorisController as PublicAksesorisController;
use App\Http\Controllers\Admin\AdminContentController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\AksesorisController;
use App\Http\Controllers\Admin\KoleksiController as AdminKoleksiController;
use App\Http\Controllers\Admin\DisewaController;
use App\Http\Controllers\Admin\SearchController;


// Rute Halaman Publik
Route::get('/', [HomeController::class, 'index'])->name('home.index');

// TAMBAHKAN RUTE INI
Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Rute Halaman Publik
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang.index');
Route::get('/aksesoris', [PublicAksesorisController::class, 'index'])->name('aksesoris.index');
Route::get('/koleksi', [KoleksiController::class, 'index'])->name('koleksi.index');
Route::get('/koleksi/{id}', [KoleksiController::class, 'show'])->name('koleksi.show');
Route::get('/aksesoris/{id}', [PublicAksesorisController::class, 'show'])->name('aksesoris.show');

Route::get('/koleksi/{id}/booked-dates', [KoleksiController::class, 'getBookedDates'])->name('koleksi.bookedDates');
Route::get('/aksesoris/{id}/booked-dates', [PublicAksesorisController::class, 'getBookedDates'])->name('aksesoris.bookedDates');



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
        Route::get('/search', [SearchController::class, 'search'])->name('search');
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
        Route::resource('/galeri', GalleryController::class);
        Route::resource('/koleksi', AdminKoleksiController::class);
        Route::resource('/aksesoris', AksesorisController::class);
        Route::resource('/disewa', DisewaController::class);
        Route::get('/get-item-details/{type}/{id}', [DisewaController::class, 'getItemDetails'])->name('disewa.getItemDetails');

    });
});

require __DIR__.'/auth.php';
