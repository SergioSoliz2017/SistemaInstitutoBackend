<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GrupoInscrito;

class GrupoInscritoController extends Controller
{
    public function agregarGrupoInscrito (Request $request) {
        $grupo = new GrupoInscrito();
        $grupo->CODCURSOINSCRITO=$request->CODCURSOINSCRITO;
        $grupo->CANTIDADMAXIMA=$request->CANTIDADMAXIMA;
        $grupo->NOMBREGRUPO = $request -> NOMBREGRUPO;
        $grupo->save();
    }
    public function buscarGrupo ($id){
        return GrupoInscrito::where("NOMBREGRUPO",$id)->get();
    }
}
