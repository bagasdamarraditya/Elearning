<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Models\Courses;


/**
 * Http Method :
 * 1. Get : Untuk Menmapilkan
 * 2. Post : Untuk Mengirim Data
 * 3. Put : Untuk Mengupdate data
 * 4. Delete : Untuk Menghapus data
 */

// Route untuk menampilkan teks salam


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('admin/dashboard',[DashboardController::class,'index'])->name('dashboard');

// Route untuk menampilkan halaman student
Route::get('admin/student',[StudentController::class,'index'])->middleware('admin');

// Route untuk menampilkan halaman student
Route::get('admin/courses',[CoursesController::class,'index']);

// Route untuk menampilkan form tambah student
Route::get('admin/student/create',[StudentController::class,'create'])->middleware('admin');;

// Route untuk mengirim data student baru
Route::post('admin/student/store',[StudentController::class,'store']);

// Route untuk menambahkan halmaan edit student
Route::get('admin/student/edit/{id}',[StudentController::class,'edit']);

// Route untuk menyimpan hasil update student
Route::put('admin/student/update/{id}',[StudentController::class,'update']);

// Route untuk menghapus student
Route::delete('admin/student/delete/{id}',[StudentController::class,'destroy']);

// Route untuk menampilkan form tambah courses
Route::get('admin/courses/create',[CoursesController::class,'create']);

// Route untuk mengirim data courses baru
Route::post('admin/courses/store',[CoursesController::class,'store']);

// Route untuk menampilkan halaman edit courses
Route::get('admin/courses/edit/{id}', [CoursesController::class, 'edit']);

// Route untuk menyimpan hasil update courses
Route::put('admin/courses/update/{id}', [CoursesController::class, 'update']);

// Route untuk menghapus courses
Route::delete('admin/courses/delete/{id}',[CoursesController::class,'destroy']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
