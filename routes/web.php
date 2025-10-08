<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InventoriesController;

Route::resource('/inventories', InventoriesController::class);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
