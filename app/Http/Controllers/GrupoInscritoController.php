<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GrupoInscrito;

class GrupoInscritoController extends Controller
{
    public function agregarGrupoInscrito (Request $request) {
        $grupo = new GrupoInscrito();
        $grupo->CODESTUDIANTE=$request->CODESTUDIANTE;
        $grupo->CODCURSOINSCRITO=$request->CODCURSOINSCRITO;
        $grupo->CANTIDADMAXIMA=$request->CANTIDADMAXIMA;
        $grupo->NOMBREGRUPO = $request -> NOMBREGRUPO;
        $grupo->save();
    }
    public function buscarGrupo ($id){
        return GrupoInscrito::where("NOMBREGRUPO",$id)->get();
    }
    public function obtenerFecha ($codEst,$codCurso,$codGrupo){
        return GrupoInscrito::where("CODESTUDIANTE", $codEst)
        ->where("CODCURSOINSCRITO", $codCurso)
        ->where("CODGRUPOINSCRITO", $codGrupo)
        ->pluck('FECHAINICIO');
      }
}
