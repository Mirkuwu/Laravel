<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AsistenciaController;
use App\Http\Controllers\Api\HorarioController;
use App\Http\Controllers\api\InformacionController;

//falta organizar las rutas

Route::post('/login', [AuthController::class, 'login']);
Route::post('/alfa', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->get('/asistencias', [AsistenciaController::class, 'asistencia']);

Route::middleware('auth:sanctum')->get('/horario', [HorarioController::class, 'horarioAlumno']);
Route::middleware('auth:sanctum')->get('/horario', [HorarioController::class, 'horarioDocente']);

/*
Route::middleware('auth:sanctum')->get('/direcciones',[InformacionController::class, 'direcciones']);
Route::middleware('auth:sanctum')->get('/infofamiliar',[InformacionController::class, 'infofamiliar']);
Route::middleware('auth:sanctum')->get('/infoProfesional',[InformacionController::class, 'infoProfesional']);

 */
Route::middleware(['auth:sanctum', 'token.scope:admin'])->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/direcciones', [InformacionController::class, 'direcciones']);
    Route::post('/direcciones', [InformacionController::class, 'storeDireccion']);
    Route::delete('/direcciones/{id}', [InformacionController::class, 'destroyDireccion']);

    Route::get('/info-familiar', [InformacionController::class, 'infofamiliar']);
    Route::post('/info-familiar', [InformacionController::class, 'storeInfoFamiliar']);
    Route::delete('/info-familiar/{id}', [InformacionController::class, 'destroyInfoFamiliar']);

    Route::get('/info-profesional', [InformacionController::class, 'infoProfesional']);
    Route::post('/info-profesional', [InformacionController::class, 'storeInfoProfesional']);
    Route::delete('/info-profesional/{id}', [InformacionController::class, 'destroyInfoProfesional']);
});

Route::middleware(['auth:sanctum', 'token.scope:docente'])->group(function () {
    Route::get('/asistencias', [AsistenciaController::class, 'asistenciaAlumnos']);
    Route::post('/asistencias/{id}', [AsistenciaController::class, 'storaAsistenciaAlumno']);
});
