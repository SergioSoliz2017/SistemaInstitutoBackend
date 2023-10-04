<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Registro;

class EstudianteController extends Controller
{
    public function agregarEstudiante (Request $request) {
        $registro = new Registro();
        $registro->CODINSCRIPCION=$request->CODINSCRIPCION;
        $registro->CODTRABAJADOR=$request->CODTRABAJADOR;
        $registro->FECHAINSCRIPCION=$request->FECHAINSCRIPCION;
        $registro->COSTOINSCRIPCION = $request -> COSTOINSCRIPCION;
        $registro->SEDE = $request->SEDE;
        $registro->HABILITADO = $request->HABILITADO;
        $registro->save();

        $estudiante = new Estudiante();
        $estudiante->CODESTUDIANTE=$request->CODESTUDIANTE;
        $estudiante->CODINSCRIPCION=$request->CODINSCRIPCION;
        $estudiante->NOMBREESTUDIANTE = $request -> NOMBREESTUDIANTE;
        $estudiante->APELLIDOESTUDIANTE = $request -> APELLIDOESTUDIANTE;
        $estudiante->FECHANACIMIENTOESTUDIANTE = $request -> FECHANACIMIENTOESTUDIANTE;
        $estudiante->GENEROESTUDIANTE = $request -> GENEROESTUDIANTE;
        $estudiante->DIRECCION = $request -> DIRECCION;
        $estudiante->COLEGIO = $request -> COLEGIO;
        $estudiante->TURNO = $request -> TURNO;
        $estudiante->CURSO = $request -> CURSO;
        $estudiante->TIPOCOLEGIO = $request -> TIPOCOLEGIO;
        $estudiante->PAIS = $request -> PAIS;
        $estudiante->DEPARTAMENTO = $request -> DEPARTAMENTO;
        $estudiante->CIUDAD = $request -> CIUDAD;
        $estudiante->HABILITADO = $request -> HABILITADO;
        $estudiante->HUELLAESTUDIANTE=$request->HUELLAESTUDIANTE;
        $estudiante->save();
    }

    public function show()
    {
        return Estudiante::get();
    }

    public function buscarEstudiante ($id){
        return Estudiante::where("CODESTUDIANTE",$id)->get();
    }

    public function update(Request $request, $id){
        $estudiante = Estudiante::where("CODESTUDIANTE",$id)->first();
        $estudiante->NOMBREESTUDIANTE = $request -> NOMBREESTUDIANTE;
        $estudiante->APELLIDOESTUDIANTE = $request -> APELLIDOESTUDIANTE;
        $estudiante->FECHANACIMIENTOESTUDIANTE = $request -> FECHANACIMIENTOESTUDIANTE;
        $estudiante->DIRECCION = $request -> DIRECCION;
        $estudiante->COLEGIO = $request -> COLEGIO;
        $estudiante->TURNO = $request -> TURNO;
        $estudiante->CURSO = $request -> CURSO;
        $estudiante->TIPOCOLEGIO = $request -> TIPOCOLEGIO;
        $estudiante->PAIS = $request -> PAIS;
        $estudiante->DEPARTAMENTO = $request -> DEPARTAMENTO;
        $estudiante->CIUDAD = $request -> CIUDAD;
        $estudiante->save();
    }
    public function obtenerTutorDelEstudiante($id)
    {
        $estudiante = Estudiante::find($id);
        $tutores = $estudiante->tutores;

        return $tutores;
    }
}
