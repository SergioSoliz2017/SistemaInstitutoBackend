<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    public function obtenerAsistencia($codEst, $codCurso, $codGrupo)
    {
        return Asistencia::where("CODESTUDIANTE", $codEst)
            ->where("CODCURSOINSCRITO", $codCurso)
            ->where("CODGRUPOINSCRITO", $codGrupo)
            ->distinct()
            ->get();
    }
}
