<?php

use App\Http\Controllers\Api\AboutMeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Rutas para el controlador agrupadas 

Route::prefix('about-me')->group(function () {
    Route::get('/', [AboutMeController::class, 'index']);
    Route::post('/', [AboutMeController::class, 'store']);
    Route::delete('/', [AboutMeController::class, 'destroy']);
});