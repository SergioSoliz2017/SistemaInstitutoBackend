<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;

class GrupoController extends Controller
{
    public function buscarGrupo($id)
    {
        return Grupo::where("CODCURSO", $id)->get();
    }
    public function buscarGrupoNombre($id)
    {
        return Grupo::where("NOMBREGRUPO", $id)->get();
    }
    public function agregarGrupo(Request $grupo)
    {
        $grupoN = new Grupo();
        $grupoN->CODCURSO = $grupo->CODCURSO;
        $grupoN->CODSEDE = $grupo->CODSEDE;
        $grupoN->NOMBREGRUPO = $grupo->NOMBREGRUPO;
        $grupoN->CANTIDADMAXIMA = $grupo->CANTIDADMAXIMA;
        $grupoN->save();

        return "creado";
    }

    public function eliminarGrupo(Request $request)
    {
        // Obtén los datos del cuerpo de la solicitud
        $datosEliminar = $request->all();

        try {
            // Realiza la eliminación basada en los datos proporcionados
            Grupo::where('CODSEDE', $datosEliminar['CODSEDE'])
                ->where('CODCURSO', $datosEliminar['CODCURSO'])
                ->where('NOMBREGRUPO', $datosEliminar['NOMBREGRUPO'])
                ->delete();

            return response()->json(['mensaje' => 'Registro eliminado exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al intentar eliminar el registro'], 500);
        }
    }
}
