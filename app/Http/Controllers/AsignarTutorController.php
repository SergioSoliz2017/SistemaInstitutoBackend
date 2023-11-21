<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Sede;
use App\Models\Trabajador;
use App\Models\Tutor;

class AsignarTutorController extends Controller
{
    public function asignarTutor(Request $request)
    {
        $estudianteId = $request->input('estudiante_id');
        $tutorId = $request->input('tutor_id');
        $relacion = $request->input('relacion');  // Asumiendo que 'relacion' es el nombre del campo en tu formulario

        $estudiante = Estudiante::find($estudianteId);
        $tutor = Tutor::find($tutorId);

        if ($estudiante && $tutor) {
            $estudiante->tutores()->attach($tutor->CODTUTOR, ['RELACION' => $relacion]);
            // Agregar la relación en la nueva tabla con el valor de 'RELACION'
            return response()->json(['message' => 'Tutor asignado al estudiante']);
        } else {
            return response()->json(['message' => 'Error al asignar tutor al estudiante'], 400);
        }
    }
    public function asignarTrabajador(Request $request)
    {
        $trabajadorId = $request->input('codTrabajador');
        $sedeId = $request->input('codSede'); // Asumiendo que 'relacion' es el nombre del campo en tu formulario

        $trabajador = Trabajador::find($trabajadorId);
        $sede = Sede::find($sedeId);

        if ($trabajador && $sede) {
            $trabajador->sedes()->attach($sede->CODSEDE);
            // Agregar la relación en la nueva tabla con el valor de 'RELACION'
            return response()->json(['message' => 'Tutor asignado al estudiante']);
        } else {
            return response()->json(['message' => 'Error al asignar tutor al estudiante'], 400);
        }
    }
}
