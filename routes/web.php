<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/**
 * Http Method :
 * 1. Get : Untuk Menmapilkan
 * 2. Post : Untuk Mengirim Data
 * 3. Put : Untuk Mengupdate data
 * 4. Delete : Untuk Menghapus data
 */

// Route untuk menampilkan teks salam
Route::get('admin/dashboard',[DashboardController::class,'index']);

// Route