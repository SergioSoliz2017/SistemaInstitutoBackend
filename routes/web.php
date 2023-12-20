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
    return "ooool";
});


Route::post('/asignar-sede', [App\Http\Controllers\AsignarTutorController::class,"asignarTrabajador"]);
Route::post('/agregarEstudiante',[App\Http\Controllers\EstudianteController::class,"agregarEstudiante"]);
Route::post('/agregarTutor',[App\Http\Controllers\TutorController::class,"agregarTutor"]);
Route::post('/asignar-tutor', [App\Http\Controllers\AsignarTutorController::class,"asignarTutor"]);
Route::post('/agregarRegistro',[App\Http\Controllers\RegistroController::class,"agregarRegistro"]);
Route::post('/agregarCurso',[App\Http\Controllers\CursoController::class,"agregarCurso"]);
Route::post('/agregarGrupo',[App\Http\Controllers\GrupoController::class,"agregarGrupo"]);
Route::post('/agregarCursoInscrito',[App\Http\Controllers\CursoInscritoController::class,"agregarCursoInscrito"]);
Route::post('/agregarGrupoInscrito',[App\Http\Controllers\GrupoInscritoController::class,"agregarGrupoInscrito"]);
Route::post('/agregarMotivo',[App\Http\Controllers\MotivoController::class,"agregarMotivo"]);
Route::post('/agregarRelacion',[App\Http\Controllers\RelacionController::class,"agregarRelacion"]);
Route::post('/agregarSede',[App\Http\Controllers\SedeController::class,"add"]);
Route::post('/agregarTrabajador',[App\Http\Controllers\TrabajadorController::class,"add"]);
Route::post('/iniciarSesion',[App\Http\Controllers\TrabajadorController::class,"iniciarSesion"]);

Route::get('/obtenerEstudiantes/{sede}',[App\Http\Controllers\EstudianteController::class,"show"]);
Route::get('/obtenerTutor/{id}', [App\Http\Controllers\TutorController::class,"buscarTutor"]);
Route::get('/obtenerEstudiante/{id}',[App\Http\Controllers\EstudianteController::class,"buscarEstudiante"]);
Route::get('/obtenerTutores/{sede}',[App\Http\Controllers\TutorController::class,"show"]);
Route::get('/obtenerTutoresActivos',[App\Http\Controllers\TutorController::class,"showActivo"]);
Route::get('/obtenerCursos/{sede}',[App\Http\Controllers\CursoController::class,"show"]);
Route::get('/obtenerCurso/{id}',[App\Http\Controllers\CursoController::class,"buscarCurso"]);
Route::get('/obtenerGrupo/{id}/{sede}',[App\Http\Controllers\GrupoController::class,"buscarGrupo"]);
Route::get('/obtenerGrupoLimite/{id}/{sede}',[App\Http\Controllers\GrupoController::class,"buscarGrupoLimite"]);
Route::get('/obtenerGrupoNombre/{id}',[App\Http\Controllers\GrupoController::class,"buscarGrupoNombre"]);
Route::get('/darBajaTutor/{id}',[App\Http\Controllers\TutorController::class,"darBajaTutor"]);
Route::get('/darActivoTutor/{id}',[App\Http\Controllers\TutorController::class,"darActivoTutor"]);
Route::get('/darInactivoTutor/{id}',[App\Http\Controllers\TutorController::class,"darInactivoTutor"]);
Route::get('/obtenerTutoresEstudiante/{id}',[App\Http\Controllers\EstudianteController::class,"obtenerTutorDelEstudiante"]);
Route::get('/obtenerEstudiantesTutor/{id}',[App\Http\Controllers\TutorController::class,"obtenerEstudiantesDelTutor"]);
Route::get('/verificarCurso/{id}',[App\Http\Controllers\CursoController::class,"verificarCurso"]);
Route::get('/obtenerDescuento',[App\Http\Controllers\DescuentoController::class,"obtenerDescuentosHabilitados"]);
Route::post('/obtenerHorario',[App\Http\Controllers\HorarioController::class,"obtenerHorarios"]);
Route::get('/obtenerHorarioEstudiante/{id}',[App\Http\Controllers\HorarioEstudianteController::class,"obtenerHorarios"]);
Route::get('/obtenerAsistencia/{codEst}/{codCurso}/{codGrupo}',[App\Http\Controllers\AsistenciaController::class,"obtenerAsistencia"]);
Route::get('/obtenerSedes',[App\Http\Controllers\SedeController::class,"show"]);
Route::get('/obtenerTrabajadores/{sede}',[App\Http\Controllers\TrabajadorController::class,"show"]);
Route::get('/obtenerTrabajador/{id}',[App\Http\Controllers\TrabajadorController::class,"obtenerTrabajador"]);
Route::get('/obtenerInicio/{codEst}/{codCurso}/{codGrupo}',[App\Http\Controllers\GrupoInscritoController::class,"obtenerFecha"]);

Route::put('/actualizarTutor/{id}', [App\Http\Controllers\TutorController::class,"update"]);
Route::put('/actualizarEstudiante/{id}', [App\Http\Controllers\EstudianteController::class,"update"]);
Route::put('/acutalizarEstadoTutor/{id}', [App\Http\Controllers\TutorController::class,"actualizarDato"]);
Route::put('/actualizarEstadoEstudiante/{id}', [App\Http\Controllers\EstudianteController::class,"actualizarDato"]);

Route::post('/ejecutar-exe',[App\Http\Controllers\EjecutarExeController::class,"ejecutarExe"]);
Route::post('/ejecutar-exe-verificar',[App\Http\Controllers\EjecutarExeController::class,"ejecutarExeVerificar"]);

Route::get('/prueva/{id}',[App\Http\Controllers\TutorController::class,"prueba"]);

Route::delete('/eliminarGrupo',[App\Http\Controllers\GrupoController::class,"eliminarGrupo"]);
Route::delete('/eliminarCurso',[App\Http\Controllers\CursoController::class,"eliminarCurso"]);

Route::post('/subirArchivo', [App\Http\Controllers\EstudianteController::class, 'subirArchivo']);
Route::get('/contra/{id}',[App\Http\Controllers\TrabajadorController::class,"crearContra"]);
