<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function obtenerHorarios(Request $request)
    {
        return Horario::join('curso', 'horario.CODCURSO', '=', 'curso.CODCURSO')
        ->join('grupo', 'horario.CODGRUPO', '=', 'grupo.CODGRUPO')
        ->where('horario.CODCURSO', $request->CODCURSO)
        ->where('horario.CODSEDE', $request->CODSEDE)
        ->where('horario.CODGRUPO', $request->CODGRUPO)
        ->select('horario.*', 'curso.CURSO', 'grupo.NOMBREGRUPO')
        ->get();
    }
}
