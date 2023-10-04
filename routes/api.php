<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/agregarEstudiante',[App\Http\Controllers\EstudianteController::class,"agregarEstudiante"]);
Route::post('/agregarTutor',[App\Http\Controllers\TutorController::class,"agregarTutor"]);
Route::post('/asignar-tutor', [App\Http\Controllers\AsignarTutorController::class,"asignarTutor"]);
Route::post('/agregarRegistro',[App\Http\Controllers\RegistroController::class,"agregarRegistro"]);

Route::get('/obtenerEstudiantes',[App\Http\Controllers\EstudianteController::class,"show"]);
Route::get('/obtenerTutor/{id}', [App\Http\Controllers\TutorController::class,"buscarTutor"]);
Route::get('/obtenerEstudiante/{id}',[App\Http\Controllers\EstudianteController::class,"buscarEstudiante"]);
Route::get('/obtenerTutores',[App\Http\Controllers\TutorController::class,"show"]);
Route::get('/obtenerCursos',[App\Http\Controllers\CursoController::class,"show"]);

Route::put('/actualizarEstudiante/{id}', [App\Http\Controllers\EstudianteController::class,"update"]);
