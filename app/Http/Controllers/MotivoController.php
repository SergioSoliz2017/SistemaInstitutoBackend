<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motivo;

class MotivoController extends Controller
{
    public function agregarMotivo (Request $request) {
        $motivo = new Motivo();
        $motivo->CODTUTOR=$request->CODTUTOR;
        $motivo->MOTIVO=$request->MOTIVO;
        $motivo->FECHAMOTIVO=$request->FECHAMOTIVO;
        $motivo->ESTADO = $request -> ESTADO;
        $motivo->save();
    }
}
