<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
class GrupoController extends Controller
{
    public function buscarGrupo ($id){
        return Grupo::where("CODCURSO",$id)->get();
    }
    public function buscarGrupoNombre ($id){
        return Grupo::where("NOMBREGRUPO",$id)->get();
    }
}
