<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // Tambahkan ini (opsional tapi baik)
use App\Http\Controllers\InventoriesController;
use App\Http\Controllers\HomeController; // 1. Import HomeController di sini

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman awal (Welcome) bisa diakses siapa saja
Route::get('/', function () {
    return view('welcome');
});

// Mengaktifkan route untuk Login, Register, Reset Password
Auth::routes();

// Halaman Home setelah login
Route::get('/home', [HomeController::class, 'index'])->name('home');

// 2. KEAMANAN: Membungkus route inventories agar hanya bisa diakses user yang login
Route::middleware(['auth'])->group(function () {
    
    // Route resource otomatis (index, create, store, edit, update, destroy)
    Route::resource('inventories', InventoriesController::class);

});