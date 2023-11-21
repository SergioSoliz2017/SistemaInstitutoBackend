<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use Illuminate\Http\Request;

class SedeController extends Controller
{
    public function show (){
        return Sede::all();
    }
    public function add (Request $request){
        $sede = new Sede();
        $sede->CODSEDE = $request->SEDE;
        $sede->UBICACION = $request->UBICACION;
        $sede->NOMBRESEDE = $request->SEDE;
        $sede->save();
    }
}
