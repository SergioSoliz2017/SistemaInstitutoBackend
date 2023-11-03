<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    public function obtenerAsistencia($codEst , $codCurso)
    {
        return Asistencia::join('CURSOINSCRITO', 'ASISTENCIA.CODCURSOINSCRITO', '=', 'CURSOINSCRITO.CODCURSOINSCRITO')
        ->where("ASISTENCIA.CODESTUDIANTE", $codEst)
        ->where("ASISTENCIA.CODCURSOINSCRITO", $codCurso)
        ->select('ASISTENCIA.*', 'CURSOINSCRITO.CURSOINSCRITO')
        ->distinct()
        ->get();
    }
}
