<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AsistenciaController;
use App\Http\Controllers\Api\HorarioController;


Route::post('/login', [AuthController::class, 'login']);
Route::post('/alfa', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->get('/asistencias', [AsistenciaController::class, 'asistencia']);
Route::middleware('auth:sanctum')->get('/horario', [HorarioController::class, 'horarioAlumno']);
Route::middleware('auth:sanctum')->get('/horario', [HorarioController::class, 'horarioDocente']);


Route::middleware(['auth:sanctum', 'token.scope:admin'])->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
});

