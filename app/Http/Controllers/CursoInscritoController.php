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
            $cursoN->CURSOINSCRITO = $curso['NOMBRECURSO'];
            $cursoN->ESTADO = "Habilitado";
            $cursoN->save();
            $inicioClases = Grupo::where('CODSEDE', $curso['SEDE'])
                ->where('CODCURSO', $curso['CODCURSO'])
                ->where('NOMBREGRUPO', $curso['GRUPOCURSO'])
                ->value('INICIOCLASES');
            $grupo = new GrupoInscrito();
            $grupo->CODESTUDIANTE = $codigoEstudiante;
            $grupo->CODCURSOINSCRITO = $curso['CODCURSO'];
            $grupo->INICIOCLASES = $inicioClases;
            $grupo->NOMBREGRUPO = $curso['GRUPOCURSO'];
            $grupo->ESTADO = "Habilitado";
            $grupo->save();

            $horariosCurso = Horario::where('CODSEDE', $curso['SEDE'])
                ->where('CODCURSO', $curso['CODCURSO'])
                ->where('GRUPO', $curso['GRUPOCURSO'])->get();

            foreach ($horariosCurso as $dia) {
                $horario = new HorarioEstudiante();
                $horario->CODESTUDIANTE = $codigoEstudiante;
                $horario->CODCURSOINSCRITO = $curso['CODCURSO'];
                $horario->DIA = $dia->DIA;
                $horario->HORA = $dia->HORA;
                $horario->GRUPO = $curso['GRUPOCURSO'];
                $horario->save();
            }
        }
        return "listo";
    }
}
