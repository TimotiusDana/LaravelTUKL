<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InventoriesController;

Route::resource('/inventories', InventoriesController::class);

Route::get('/', function () {
    return view('welcome');
});
