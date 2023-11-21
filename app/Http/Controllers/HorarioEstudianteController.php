<?php

namespace App\Http\Controllers;

use App\Models\HorarioEstudiante;
use Illuminate\Http\Request;

class HorarioEstudianteController extends Controller
{
    public function obtenerHorarios($id)
{
    return HorarioEstudiante::join('grupoInscrito', 'grupoInscrito.CODCURSOINSCRITO', '=', 'horarioestudiante.CODCURSOINSCRITO')
        ->join('cursoinscrito', 'cursoinscrito.CODCURSOINSCRITO', '=', 'grupoInscrito.CODCURSOINSCRITO')
        ->where('cursoinscrito.CODESTUDIANTE', '=', $id)
        ->select(
            'cursoinscrito.CODESTUDIANTE',
            'cursoinscrito.CODCURSOINSCRITO',
            'grupoInscrito.CODGRUPOINSCRITO',
            'grupoInscrito.NOMBREGRUPO',
            'horarioestudiante.DIA',
            'horarioestudiante.HORA'
        )
        ->distinct()
        ->get();
}

}
