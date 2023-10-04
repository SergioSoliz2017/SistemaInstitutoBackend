<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Tutor;
class AsignarTutorController extends Controller
{
    public function asignarTutor(Request $request)
{
    $estudianteId = $request->input('estudiante_id');
    $tutorId = $request->input('tutor_id');

    $estudiante = Estudiante::find($estudianteId);
    $tutor = Tutor::find($tutorId);

    if ($estudiante && $tutor) {
        $estudiante->tutores()->attach($tutor->CODTUTOR);
        return response()->json(['message' => 'Tutor asignado al estudiante']);
    } else {
        return response()->json(['message' => 'Error al asignar tutor al estudiante'], 400);
    }
}
}
