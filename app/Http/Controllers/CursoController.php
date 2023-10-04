<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
class CursoController extends Controller
{
    public function show()
    {
        return Curso::get();
    }

    public function buscarCurso ($id){
        return Curso::where("CODCURSO",$id)->get();
    }

}
