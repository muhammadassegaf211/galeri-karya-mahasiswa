<?php

use App\Http\Controllers\KaryaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Galeri Karya Mahasiswa
|--------------------------------------------------------------------------
*/

Route::get('/', [KaryaController::class, 'index'])->name('home');
Route::get('/karya/{id}', [KaryaController::class, 'show'])->name('karya.show');
Route::get('/tentang', [KaryaController::class, 'about'])->name('about');
