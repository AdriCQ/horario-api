<?php

use App\Http\Controllers\HorarioController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('horarios')->group(function () {
    Route::get('', [HorarioController::class, 'filter']);
    Route::post('', [HorarioController::class, 'store']);
    Route::get('{horario}', [HorarioController::class, 'show']);
    Route::patch('{horario}', [HorarioController::class, 'update']);
    Route::delete('{horario}', [HorarioController::class, 'remove']);
});

Route::prefix('users')->group(function () {
    Route::get('', [UserController::class, 'me']);
    Route::post('login', [UserController::class, 'login']);
});
