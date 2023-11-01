<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DpfpApi\UserRestApiController;
use App\Http\Controllers\DpfpApi\TempFingerprintController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function(){
    return "holamundoFuncionaTodoBem";
});

Route::post('/agregarEstudiante',[App\Http\Controllers\EstudianteController::class,"agregarEstudiante"]);
Route::post('/agregarTutor',[App\Http\Controllers\TutorController::class,"agregarTutor"]);
Route::post('/asignar-tutor', [App\Http\Controllers\AsignarTutorController::class,"asignarTutor"]);
Route::post('/agregarRegistro',[App\Http\Controllers\RegistroController::class,"agregarRegistro"]);
Route::post('/agregarCurso',[App\Http\Controllers\CursoController::class,"agregarCurso"]);
Route::post('/agregarGrupo',[App\Http\Controllers\GrupoController::class,"agregarGrupo"]);
Route::post('/agregarCursoInscrito',[App\Http\Controllers\CursoInscritoController::class,"agregarCursoInscrito"]);
Route::post('/agregarGrupoInscrito',[App\Http\Controllers\GrupoInscritoController::class,"agregarGrupoInscrito"]);
Route::post('/agregarMotivo',[App\Http\Controllers\MotivoController::class,"agregarMotivo"]);

Route::get('/obtenerEstudiantes',[App\Http\Controllers\EstudianteController::class,"show"]);
Route::get('/obtenerTutor/{id}', [App\Http\Controllers\TutorController::class,"buscarTutor"]);
Route::get('/obtenerEstudiante/{id}',[App\Http\Controllers\EstudianteController::class,"buscarEstudiante"]);
Route::get('/obtenerTutores',[App\Http\Controllers\TutorController::class,"show"]);
Route::get('/obtenerCursos',[App\Http\Controllers\CursoController::class,"show"]);
Route::get('/obtenerCurso/{id}',[App\Http\Controllers\CursoController::class,"buscarCurso"]);
Route::get('/obtenerGrupo/{id}',[App\Http\Controllers\GrupoController::class,"buscarGrupo"]);
Route::get('/obtenerGrupoNombre/{id}',[App\Http\Controllers\GrupoController::class,"buscarGrupoNombre"]);
Route::get('/darBajaTutor/{id}',[App\Http\Controllers\TutorController::class,"darBajaTutor"]);
Route::get('/darActivoTutor/{id}',[App\Http\Controllers\TutorController::class,"darActivoTutor"]);
Route::get('/darInactivoTutor/{id}',[App\Http\Controllers\TutorController::class,"darInactivoTutor"]);
Route::get('/obtenerTutores/{id}',[App\Http\Controllers\EstudianteController::class,"obtenerTutorDelEstudiante"]);
Route::get('/obtenerEstudiantes/{id}',[App\Http\Controllers\TutorController::class,"obtenerEstudiantesDelTutor"]);
Route::get('/verificarCurso/{id}',[App\Http\Controllers\CursoController::class,"verificarCurso"]);
Route::get('/obtenerDescuento',[App\Http\Controllers\DescuentoController::class,"obtenerDescuentosHabilitados"]);
Route::get('/obtenerHorario',[App\Http\Controllers\HorarioController::class,"obtenerHorarios"]);

Route::put('/actualizarTutor/{id}', [App\Http\Controllers\TutorController::class,"update"]);
Route::put('/actualizarEstudiante/{id}', [App\Http\Controllers\EstudianteController::class,"update"]);
Route::put('/acutalizarEstadoTutor/{id}', [App\Http\Controllers\TutorController::class,"actualizarDato"]);
Route::put('/actualizarEstadoEstudiante/{id}', [App\Http\Controllers\EstudianteController::class,"actualizarDato"]);

Route::post('/ejecutar-exe',[App\Http\Controllers\EjecutarExeController::class,"ejecutarExe"]);
Route::post('/ejecutar-exe-verificar',[App\Http\Controllers\EjecutarExeController::class,"ejecutarExeVerificar"]);

Route::get('/prueva/{id}',[App\Http\Controllers\TutorController::class,"prueba"]);

Route::delete('/eliminarGrupo',[App\Http\Controllers\GrupoController::class,"eliminarGrupo"]);
Route::delete('/eliminarCurso',[App\Http\Controllers\CursoController::class,"eliminarCurso"]);
