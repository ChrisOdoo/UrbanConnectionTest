<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/stock', [StockController::class, 'index']);
