<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Grupo;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{
    public function show($sede)
    {
        if ($sede === "NACIONAL") {
            $cursos = Curso::addSelect(['CODCURSO', 'CURSO', 'ESTADO'])
                ->addSelect(DB::raw('(SELECT COUNT(*) FROM grupo WHERE grupo.CODCURSO = curso.CODCURSO) as Cantidad'))
                ->get();
        } else {
            $cursos = Curso::addSelect(['CODCURSO', 'CURSO', 'ESTADO'])
                ->addSelect(DB::raw('(SELECT COUNT(*) FROM grupo WHERE grupo.CODCURSO = curso.CODCURSO AND grupo.CODSEDE = ?) as Cantidad'))
                ->addBinding($sede, 'select')
                ->get();
        }


        return $cursos;
    }


    public function buscarCurso($id)
    {
        return Curso::where("CODCURSO", $id)->get();
    }
    public function verificarCurso($id)
    {
        return Curso::where("CURSO", $id)->get();
    }

    public function agregarCurso(Request $request)
    {
        $curso = new Curso();
        $curso->CODCURSO = $request->CODCURSO;
        $curso->CURSO = $request->CURSO;
        $curso->ESTADO = "Activo";
        $curso->save();
    }

    public function eliminarCurso(Request $request)
    {
        $datosEliminar = $request->all();
        try {
            Grupo::where('CODSEDE', $datosEliminar['CODSEDE'])
                ->where('CODCURSO', $datosEliminar['CODCURSO'])
                ->delete();

            // Ahora, eliminar el curso
            Curso::where('CODSEDE', $datosEliminar['CODSEDE'])
                ->where('CODCURSO', $datosEliminar['CODCURSO'])
                ->delete();
            return response()->json(['mensaje' => 'Registro eliminado exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al intentar eliminar el registro'], 500);
        }
    }
}
