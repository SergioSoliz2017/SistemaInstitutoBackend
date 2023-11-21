<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\GrupoInscrito;
use App\Models\Horario;
use Carbon\Carbon;

class GrupoController extends Controller
{
    public function buscarGrupo($id, $sede)
    {
        if ($sede === "NACIONAL"){
            return Grupo::where("CODCURSO", $id)->get();
        }else{
            return Grupo::where("CODCURSO", $id)->where("CODSEDE", $sede)->get();
        }
    }
    public function buscarGrupoLimite($id, $sede)
    {
        $listaLimite = Grupo::where("CODCURSO", $id)->where("CODSEDE", $sede)->get();
        $estados = [];

        foreach ($listaLimite as $grupo) {
            $codCurso = $grupo->CODCURSO;
            $codGrupo = $grupo->CODGRUPO;

            $cantidad = GrupoInscrito::where("CODCURSOINSCRITO", $codCurso)
                ->where("CODGRUPOINSCRITO", $codGrupo)
                ->count();

            // Obtener el límite del grupo
            $limite = $grupo->LIMITE;

            // Realizar las verificaciones y asignar el estado correspondiente al array
            if ($cantidad <= $limite - 6) {
                $grupo->LIMITE = "HAY";
            } elseif ($cantidad <= $limite - 5) {
                $grupo->LIMITE = "CASI";
            } elseif ($cantidad <= $limite) {
                $grupo->LIMITE = "LLENO";
            }
        }

        // Puedes hacer más cosas con el array de estados antes de devolverlo
        // ...

        return $listaLimite;
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
        $grupoN->CODGRUPO = $grupo->CODGRUPO;
        $grupoN->LIMITE = $grupo->LIMITE;
        $grupoN->PRECIO = $grupo->PRECIO;
        $grupoN->ESTADO = "Activo";
        $grupoN->save();
        $dias = $grupo->input('DIAS');
        foreach ($dias as $dia) {
            $horario = new Horario();
            $horario->CODCURSO = $grupo->CODCURSO;
            $horario->CODSEDE = $grupo->CODSEDE;
            $horario->CODGRUPO = $grupo->CODGRUPO;
            $horario->DIA = $dia; // Asigna el día según tu lógica
            $horario->HORA = Carbon::createFromFormat('H:i', $grupo->HORA); // Asigna la hora según tu lógica
            $horario->save();
        }
    }

    public function eliminarGrupo(Request $request)
    {
        // Obtén los datos del cuerpo de la solicitud
        $datosEliminar = $request->all();
        try {
            Horario::where('CODSEDE', $datosEliminar['CODSEDE'])
                ->where('CODCURSO', $datosEliminar['CODCURSO'])
                ->where('CODGRUPO', $datosEliminar['CODGRUPO'])
                ->delete();

            Grupo::where('CODSEDE', $datosEliminar['CODSEDE'])
                ->where('CODCURSO', $datosEliminar['CODCURSO'])
                ->where('CODGRUPO', $datosEliminar['CODGRUPO'])
                ->delete();

            return response()->json(['mensaje' => 'Registro eliminado exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al intentar eliminar el registro'], 500);
        }
    }
}
