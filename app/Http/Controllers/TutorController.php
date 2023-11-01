<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Estudiantetutor;
use Illuminate\Http\Request;
use App\Models\Tutor;

class TutorController extends Controller
{
    public function agregarTutor(Request $request)
    {
        $tutor = new Tutor();
        $tutor->CODTUTOR = $request->CODTUTOR;
        $tutor->NOMBRETUTOR = $request->NOMBRETUTOR;
        $tutor->FECHANACIMIENTOTUTOR = $request->FECHANACIMIENTOTUTOR;
        $tutor->CELULARTUTOR = $request->CELULARTUTOR;
        $tutor->CELULARALTERNATIVO = $request->CELULARALTERNATIVO;
        $tutor->APELLIDOTUTOR = $request->APELLIDOTUTOR;
        $tutor->GENEROTUTOR = $request->GENEROTUTOR;
        $tutor->CORREO = $request->CORREO;
        $tutor->OCUPACION = $request->OCUPACION;
        $tutor->RELACION = $request->RELACION;
        $tutor->ESTADO = $request->ESTADO;
        $tutor->save();
    }

    public function buscarTutor($id)
    {
        return Tutor::where("CODTUTOR", $id)->get();
    }

    public function show()
    {
        return Tutor::get();
    }

    public function actualizarDato(Request $request, $id)
    {

        $tutor = Tutor::find($id);
        if ($tutor) {
            $tutor->update(['ESTADO' => $request->ESTADO]);
            return response()->json(['mensaje' => 'Dato actualizado correctamente']);
        } else {
            return response()->json(['mensaje' => 'Registro no encontrado'], 404);
        }
    }

    public function darBajaTutor($id)
    {
        $tutor = Tutor::find($id);
        $estudiantes = $tutor->estudiantes;
        $lista = array();
        foreach ($estudiantes as $estudiante) {
            if ($estudiante->tutores->count() === 1) {
                array_push($lista, $estudiante);
            } else {
                $numeroDeTutoresActivos = $estudiante->tutores()->where('ESTADO', 'Activo')->count();
                if ($numeroDeTutoresActivos == 1) {
                    array_push($lista, $estudiante);
                }
            }
        }
        $tutor->update(['ESTADO' => "Baja"]);
        foreach ($lista as $estudiante) {
            $estudiante->update(['HABILITADO' => "Deshabilitado"]);
        }
        //return $lista ;
    }

    public function darActivoTutor($id)
    {
        $tutor = Tutor::find($id);
        $estudiantes = $tutor->estudiantes;
        $lista = array();
        foreach ($estudiantes as $estudiante) {
            if ($estudiante->tutores->count() === 1) {
                array_push($lista, $estudiante);
            } else {
                $numeroDeTutoresActivos = $estudiante->tutores()->where('ESTADO', 'Activo')->count();
                if ($numeroDeTutoresActivos == 1) {
                    array_push($lista, $estudiante);
                }
            }
        }
        $tutor->update(['ESTADO' => "Activo"]);
        foreach ($lista as $estudiante) {
            $estudiante->update(['HABILITADO' => "Habilitado"]);
        }

        //return $lista ;
    }
    public function darInactivoTutor($id)
    {
        $tutor = Tutor::find($id);
        $estudiantes = $tutor->estudiantes;
        $lista = array();
        foreach ($estudiantes as $estudiante) {
            if ($estudiante->tutores->count() === 1) {
                array_push($lista, $estudiante);
            } else {
                $numeroDeTutoresActivos = $estudiante->tutores()->where('ESTADO', 'Activo')->count();
                if ($numeroDeTutoresActivos == 1) {
                    array_push($lista, $estudiante);
                }
            }
        }
        $tutor->update(['ESTADO' => "Inactivo"]);
        foreach ($lista as $estudiante) {
            $estudiante->update(['HABILITADO' => "Inactivo"]);
        }
        //return $lista ;
    }
    public function obtenerEstudiantesDelTutor($id)
    {
        $tutor = Tutor::find($id);
        $estudiantes = $tutor->estudiantes;

        return $estudiantes;
    }
    public function update(Request $request, $id)
    {
        $tutor = Tutor::where("CODTUTOR", $id)->first();
        $tutor->NOMBRETUTOR = $request->NOMBRETUTOR;
        $tutor->APELLIDOTUTOR=$request->APELLIDOTUTOR;
        $tutor->CELULARTUTOR = $request->CELULARTUTOR;
        $tutor->save();
        $estudiante = Estudiante::where("CODESTUDIANTE", $id)->first();
        if ($estudiante != null){
            $estudiante->NOMBREESTUDIANTE = $request->NOMBRETUTOR;
            $estudiante->APELLIDOESTUDIANTE = $request->APELLIDOTUTOR;
            $estudiante-> save();
        }
    }
}
