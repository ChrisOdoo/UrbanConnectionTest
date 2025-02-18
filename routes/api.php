<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HistorialCarritoController;

//Rutas MAIN API
Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('vendedores')->group(function () {
        Route::get('/', [VendedorController::class, 'index']);
        Route::post('/', [VendedorController::class, 'store']);
        Route::get('{id}', [VendedorController::class, 'show']);
        Route::put('{id}', [VendedorController::class, 'update']);
        Route::delete('{id}', [VendedorController::class, 'destroy']);
    });

    Route::prefix('tiendas')->group(function () {
        Route::get('/', [TiendaController::class, 'index']);
        Route::post('/', [TiendaController::class, 'store']);
        Route::get('{id}', [TiendaController::class, 'show']);
        Route::put('{id}', [TiendaController::class, 'update']);
        Route::delete('{id}', [TiendaController::class, 'destroy']);
    });

    Route::prefix('productos')->group(function () {
        Route::get('/', [ProductoController::class, 'index']);
        Route::post('/', [ProductoController::class, 'store']);
        Route::get('{id}', [ProductoController::class, 'show']);
        Route::put('{id}', [ProductoController::class, 'update']);
        Route::delete('{id}', [ProductoController::class, 'destroy']);
    });

    Route::prefix('clientes')->group(function () {
        Route::get('/', [ClienteController::class, 'index']);
        Route::post('/', [ClienteController::class, 'store']);
        Route::get('{id}', [ClienteController::class, 'show']);
        Route::put('{id}', [ClienteController::class, 'update']);
        Route::delete('{id}', [ClienteController::class, 'destroy']);
    });

    Route::prefix('historial-carrito')->group(function () {
        Route::get('/', [HistorialCarritoController::class, 'index']);
        Route::post('/', [HistorialCarritoController::class, 'store']);
        Route::get('{id}', [HistorialCarritoController::class, 'show']);
        Route::put('{id}', [HistorialCarritoController::class, 'update']);
        Route::delete('{id}', [HistorialCarritoController::class, 'destroy']);
    });
});

// Ruta para el registro de usuarios
Route::post('/register', [AuthController::class, 'register']);

// Ruta para el login de usuarios
Route::post('/login', [AuthController::class, 'login']);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
