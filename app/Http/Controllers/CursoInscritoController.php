<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CursoInscrito;
use App\Models\Grupo;
use App\Models\GrupoInscrito;
use App\Models\Horario;
use App\Models\HorarioEstudiante;
use Carbon\Carbon;
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
            $grupo->FECHAINICIO = $request->FECHA;

            $fechaInicio = Carbon::parse($request->FECHA);
            $fechaFin = $fechaInicio->copy()->addMonths($curso['MESES']);
            
            $grupo->FECHAFIN = $fechaFin;
            $horariosCurso = Horario::where('CODSEDE', $request->SEDE)
                ->where('CODCURSO', $curso['CODCURSO'])
                ->where('CODGRUPO', $curso['CODGRUPO'])->get();
                $tamanoHorariosCurso = $horariosCurso->count();
                $diferenciaSemanas = $fechaInicio->diffInWeeks($fechaFin);
                $cantidadTotalClases = $tamanoHorariosCurso * $diferenciaSemanas;
                $grupo-> NUMEROCLASES = $cantidadTotalClases;
                $grupo->save();
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
