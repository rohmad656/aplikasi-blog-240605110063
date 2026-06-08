<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriArtikelController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController; // Import DashboardController baru

// 1. HALAMAN PENGUNJUNG (PUBLIC)
Route::get('/', [BlogController::class, 'index'])->name('blog.index');
Route::get('/baca/{id}', [BlogController::class, 'show'])->name('blog.show');

// 2. OTENTIKASI SISTEM (GUEST)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.process');
    Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [LoginController::class, 'register'])->name('register.process');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// 3. CONTROL PANEL CMS (AUTH)
Route::middleware('auth')->group(function () {
    // Rute dashboard sekarang menggunakan DashboardController
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('kategori', KategoriArtikelController::class)->except(['show']);
    Route::resource('penulis', PenulisController::class)->except(['show']);
    Route::resource('artikel', ArtikelController::class)->except(['show']);
});
