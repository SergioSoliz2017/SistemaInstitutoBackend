<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Grupo;

class CursoController extends Controller
{
    public function show()
    {
        return Curso::get();
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
        $curso->CODSEDE = $request->CODSEDE;
        $curso->CURSO = $request->CURSO;
        $curso->DURACIONCURSO = $request->DURACIONCURSO;
        $curso->save();

        $lista = $request->LISTAGRUPOS;

        foreach ($lista as $grupo) {
            $grupoN = new Grupo();
            $grupoN->CODCURSO = $curso->CODCURSO; // Usar $curso en lugar de $grupo
            $grupoN->CODSEDE = $grupo['CODSEDE']; // Acceder a las propiedades como array
            $grupoN->NOMBREGRUPO = $grupo['NOMBREGRUPO'];
            $grupoN->CANTIDADMAXIMA = $grupo['CANTIDADMAXIMA'];
            $grupoN->save();
        }
        return "listo";
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
