<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Registro;
use App\Models\Tutor;
use Illuminate\Support\Facades\Storage;

class EstudianteController extends Controller
{
    public function agregarEstudiante(Request $request)
    {
        $registro = new Registro();
        $registro->CODINSCRIPCION = $request->CODINSCRIPCION;
        $registro->CODTRABAJADOR = $request->CODTRABAJADOR;
        $registro->FECHAINSCRIPCION = $request->FECHAINSCRIPCION;
        $registro->COSTOINSCRIPCION = $request->COSTOINSCRIPCION;
        $registro->CODSEDE = $request->SEDE;
        $registro->HABILITADO = $request->HABILITADO;
        $registro->save();
        if ($request->HUELLA === "NoVirtual") {
            $rutaArchivo = 'C:\InfinityChess\RegistrarHuella\Huellas\\' . $request->CODESTUDIANTE . '.txt';
            $contenido = file_get_contents($rutaArchivo);
            Storage::put("/" . $request->SEDE . '\\' . $request->CODESTUDIANTE . '.txt', $contenido);
            $estudiante = new Estudiante();
            $estudiante->CODESTUDIANTE = $request->CODESTUDIANTE;
            $estudiante->CODINSCRIPCION = $request->CODINSCRIPCION;
            $estudiante->NOMBREESTUDIANTE = $request->NOMBREESTUDIANTE;
            $estudiante->APELLIDOESTUDIANTE = $request->APELLIDOESTUDIANTE;
            $estudiante->FECHANACIMIENTOESTUDIANTE = $request->FECHANACIMIENTOESTUDIANTE;
            $estudiante->GENEROESTUDIANTE = $request->GENEROESTUDIANTE;
            $estudiante->DIRECCION = $request->DIRECCION;
            $estudiante->COLEGIO = $request->COLEGIO;
            $estudiante->TURNO = $request->TURNO;
            $estudiante->CURSO = $request->CURSO;
            $estudiante->TIPOCOLEGIO = $request->TIPOCOLEGIO;
            $estudiante->PAIS = $request->PAIS;
            $estudiante->DEPARTAMENTO = $request->DEPARTAMENTO;
            $estudiante->CIUDAD = $request->CIUDAD;
            $estudiante->HABILITADO = $request->HABILITADO;
            $estudiante->HUELLAESTUDIANTE = $contenido;
            $estudiante->CODSEDE = $request->SEDE;
            $estudiante->save();
        } else {
            $estudiante = new Estudiante();
            $estudiante->CODESTUDIANTE = $request->CODESTUDIANTE;
            $estudiante->CODINSCRIPCION = $request->CODINSCRIPCION;
            $estudiante->NOMBREESTUDIANTE = $request->NOMBREESTUDIANTE;
            $estudiante->APELLIDOESTUDIANTE = $request->APELLIDOESTUDIANTE;
            $estudiante->FECHANACIMIENTOESTUDIANTE = $request->FECHANACIMIENTOESTUDIANTE;
            $estudiante->GENEROESTUDIANTE = $request->GENEROESTUDIANTE;
            $estudiante->DIRECCION = $request->DIRECCION;
            $estudiante->COLEGIO = $request->COLEGIO;
            $estudiante->TURNO = $request->TURNO;
            $estudiante->CURSO = $request->CURSO;
            $estudiante->TIPOCOLEGIO = $request->TIPOCOLEGIO;
            $estudiante->PAIS = $request->PAIS;
            $estudiante->DEPARTAMENTO = $request->DEPARTAMENTO;
            $estudiante->CIUDAD = $request->CIUDAD;
            $estudiante->HABILITADO = $request->HABILITADO;
            $estudiante->CODSEDE = $request->SEDE;
            $estudiante->save();
        }
    }

    public function show($sede)
    {
        if ($sede === "NACIONAL") {
            $estudiantes = Estudiante::select(
                'CODESTUDIANTE',
                'CODINSCRIPCION',
                "NOMBREESTUDIANTE",
                "APELLIDOESTUDIANTE",
                "FECHANACIMIENTOESTUDIANTE",
                "GENEROESTUDIANTE",
                "DIRECCION",
                "COLEGIO",
                "TURNO",
                "CURSO",
                "TIPOCOLEGIO",
                "PAIS",
                "DEPARTAMENTO",
                "CIUDAD",
                "HABILITADO",
            )->get();
        } else {
            $estudiantes = Estudiante::select(
                'CODESTUDIANTE',
                'CODINSCRIPCION',
                "NOMBREESTUDIANTE",
                "APELLIDOESTUDIANTE",
                "FECHANACIMIENTOESTUDIANTE",
                "GENEROESTUDIANTE",
                "DIRECCION",
                "COLEGIO",
                "TURNO",
                "CURSO",
                "TIPOCOLEGIO",
                "PAIS",
                "DEPARTAMENTO",
                "CIUDAD",
                "HABILITADO",
            )->where("CODSEDE", $sede)->get();
        }
        return $estudiantes;
    }

    public function buscarEstudiante($id)
    {
        return Estudiante::where("CODESTUDIANTE", $id)->get();
    }

    public function update(Request $request, $id)
    {
        $estudiante = Estudiante::where("CODESTUDIANTE", $id)->first();
        $estudiante->NOMBREESTUDIANTE = $request->NOMBREESTUDIANTE;
        $estudiante->APELLIDOESTUDIANTE = $request->APELLIDOESTUDIANTE;
        $estudiante->DIRECCION = $request->DIRECCION;
        $estudiante->COLEGIO = $request->COLEGIO;
        $estudiante->PAIS = $request->PAIS;
        $estudiante->DEPARTAMENTO = $request->DEPARTAMENTO;
        $estudiante->CIUDAD = $request->CIUDAD;
        $estudiante->FECHANACIMIENTOESTUDIANTE = $request->FECHANACIMIENTOESTUDIANTE;
        $estudiante->save();
        $tutor = Tutor::where("CODTUTOR", $id)->first();
        if ($tutor != null) {
            $tutor->NOMBRETUTOR = $request->NOMBREESTUDIANTE;
            $tutor->APELLIDOTUTOR = $request->APELLIDOESTUDIANTE;
            $tutor->save();
        }
    }
    public function obtenerTutorDelEstudiante($id)
    {
        $estudiante = Estudiante::find($id);
        $tutores = $estudiante->tutores;

        return $tutores;
    }
    public function actualizarDato(Request $request, $id)
    {
        $estudiante = Estudiante::find($id);
        if ($estudiante) {
            $estudiante->update(['HABILITADO' => $request->HABILITADO]);
            return response()->json(['mensaje' => 'Dato actualizado correctamente']);
        } else {
            return response()->json(['mensaje' => 'Registro no encontrado'], 404);
        }
    }
}
