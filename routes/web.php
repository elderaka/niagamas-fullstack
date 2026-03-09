<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SyncController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('products.index');
});

Route::resource('products', ProductController::class);
Route::post('/products/sync', [SyncController::class, 'sync'])->name('products.sync');
