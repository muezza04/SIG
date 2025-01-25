<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TematikController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/', [TematikController::class, 'index'])->name('deskripsi');

Route::get('/luaswilayah', [TematikController::class, 'ls'])->name('luaswilayah');

Route::get('/populasi', [TematikController::class, 'populasi'])->name('populasi');

Route::get('/kepadatanpenduduk', [TematikController::class, 'kp'])->name('kepadatanpenduduk');

Route::get('/jahe', [TematikController::class, 'jahe'])->name('jahe');

Route::get('/jeruk', [TematikController::class, 'jeruk'])->name('jeruk');

Route::get('/kencur', [TematikController::class, 'kencur'])->name('kencur');

Route::get('/kunyit', [TematikController::class, 'kunyit'])->name('kunyit');

Route::get('/alltematik', [TematikController::class, 'tematik'])->name('tematik');

Route::get('/about', [HomeController::class, 'about'])->name('about');
