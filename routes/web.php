<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/beranda', function () {
//     return view('beranda');
// });

Route::get('/gempa', function () {
    return view('gempa');
});

// Route::get('/peta',[PetaController::class, 'index'])->name('peta');