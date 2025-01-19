<?php

use App\Http\Controllers\Api\AboutMeController;
use App\Http\Controllers\Api\ProjectController;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\SkillController;
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

Route::prefix('skills')->group(function () {
    Route::get('/', [SkillController::class, 'index']);
    Route::post('/', [SkillController::class, 'store']);

    // Route::get('/{id}', [SkillController::class, 'show']);
    // Route::put('/{id}', [SkillController::class, 'update']);
    // Route::delete('/{id}', [SkillController::class, 'destroy']);
});

Route::prefix('projects')->group(function () {
    Route::get('/', [ProjectController::class, 'index']);
    Route::post('/', [ProjectController::class, 'store']);

    // Route::get('/{id}', [ProjectController::class, 'show']);
    // Route::put('/{id}', [ProjectController::class, 'update']);
    // Route::delete('/{id}', [ProjectController::class, 'destroy']);
});