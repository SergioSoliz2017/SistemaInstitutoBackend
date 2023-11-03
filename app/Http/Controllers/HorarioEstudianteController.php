<?php

namespace App\Http\Controllers;

use App\Models\HorarioEstudiante;
use Illuminate\Http\Request;

class HorarioEstudianteController extends Controller
{
    public function obtenerHorarios($id)
    {
        return HorarioEstudiante::join('CURSOINSCRITO', 'HORARIOESTUDIANTE.CODCURSOINSCRITO', '=', 'CURSOINSCRITO.CODCURSOINSCRITO')
        ->where('HORARIOESTUDIANTE.CODESTUDIANTE', $id)
        ->select('HORARIOESTUDIANTE.*', 'CURSOINSCRITO.CURSOINSCRITO')
        ->distinct()
        ->get();
    }
}
