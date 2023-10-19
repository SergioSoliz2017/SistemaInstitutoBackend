<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;
class RegistroController extends Controller
{
    public function agregarRegistro (Request $request) {
        $registro = new Registro();
        $registro->CODINSCRIPCION=$request->CODINSCRIPCION;
        $registro->CODTRABAJADOR=$request->CODTRABAJADOR;
        $registro->FECHAINSCRIPCION=$request->FECHAINSCRIPCION;
        $registro->COSTOINSCRIPCION = $request -> COSTOINSCRIPCION;
        $registro->CODSEDE = $request->SEDE;
        $registro->HABILITADO = $request->HABILITADO;
        $registro->save();
    }
}
