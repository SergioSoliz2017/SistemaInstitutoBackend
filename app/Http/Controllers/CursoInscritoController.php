<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CursoInscrito;
class CursoInscritoController extends Controller
{
    public function agregarCursoInscrito (Request $request) {
        $curso = new CursoInscrito();
        $curso->CODCURSOINSCRITO=$request->CODCURSOINSCRITO;
        $curso->CODESTUDIANTE=$request->CODESTUDIANTE;
        $curso->CURSOINSCRITO = $request -> CURSOINSCRITO;
        $curso->DURACIONCURSO = $request -> DURACIONCURSO;
        $curso->save();
    }
}
