<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CursoInscrito;
use App\Models\Grupo;
use App\Models\GrupoInscrito;
use App\Models\Horario;
use App\Models\HorarioEstudiante;

class CursoInscritoController extends Controller
{
    public function agregarCursoInscrito(Request $request)
    {
        $codigoEstudiante = $request->CODESTUDIANTE;
        $listaCursos = $request->LISTACURSOS;

        foreach ($listaCursos as $curso) {
            $cursoN = new CursoInscrito();
            $cursoN->CODESTUDIANTE = $codigoEstudiante;
            $cursoN->CODCURSOINSCRITO = $curso['CODCURSO'];
            $cursoN->CURSOINSCRITO = $curso['CURSOINSCRITO'];
            $cursoN->ESTADO = "Habilitado";
            $cursoN->save();
            $grupo = new GrupoInscrito();
            $grupo->CODESTUDIANTE = $codigoEstudiante;
            $grupo->CODCURSOINSCRITO = $curso['CODCURSO'];
            $grupo->CODGRUPOINSCRITO = $curso['CODGRUPO'];
            $grupo->NOMBREGRUPO = $curso['NOMBREGRUPO'];
            $grupo->ESTADO = "Habilitado";
            $grupo->DIASPAGADOS = $curso['DIAPAGADO'];
            $grupo->FECHAINICIO = date('Y-m-d', strtotime($request->FECHA));
            $grupo->save();

            $horariosCurso = Horario::where('CODSEDE', $request->SEDE)
                ->where('CODCURSO', $curso['CODCURSO'])
                ->where('CODGRUPO', $curso['CODGRUPO'])->get();

            foreach ($horariosCurso as $dia) {
                $horario = new HorarioEstudiante();
                $horario->CODESTUDIANTE = $codigoEstudiante;
                $horario->CODCURSOINSCRITO = $curso['CODCURSO'];
                $horario->CODGRUPOINSCRITO = $curso['CODGRUPO'];
                $horario->DIA = $dia->DIA;
                $horario->HORA = $dia->HORA;
                $horario->save();
            }
        }
        return "listo";
    }
}
