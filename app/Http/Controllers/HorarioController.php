<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function obtenerHorarios()
    {
        return Horario::join('CURSO', 'HORARIO.CODCURSO', '=', 'CURSO.CODCURSO')
            ->select('HORARIO.*', 'CURSO.CURSO')
            ->get();
    }
}
