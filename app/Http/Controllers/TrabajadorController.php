<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use App\Models\Trabajador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TrabajadorController extends Controller
{
    public function obtenerTrabajador($id)
    {
        $trabajador = Trabajador::with('sedes')->find($id);

        return $trabajador;
    }
    public function show($sede)
    {
        if ($sede === "NACIONAL") {
            return Trabajador::with('sedes')->get();
        } else {
            return Trabajador::whereHas('sedes', function($query) use ($sede) {
                $query->where('sede.CODSEDE', $sede);
            })->with('sedes')->get();
        }
    }
    public function crearContra ($id){
        return Crypt::encryptString($id);
    }
    public function add(Request $request)
    {
        $contrasenaCifrada = Crypt::encryptString($request->CONTRASEÑA);
        $trabajador = new Trabajador();
        $trabajador->CODTRABAJADOR = $request->CODTRABAJADOR;
        $trabajador->NOMBRETRABAJADOR = $request->NOMBRETRABAJADOR;
        $trabajador->FECHANACIMIENTOTRABAJADOR = $request->FECHANACIMIENTOTRABAJADOR;
        $trabajador->ROLTRABAJADOR = $request->ROLTRABAJADOR;
        $trabajador->CONTRASEÑA = $contrasenaCifrada;
        $trabajador->ESTADO = "Activo";
        $trabajador->save();
        $trabajadorA = Trabajador::find($request->CODTRABAJADOR);
        if (is_array($request->CODSEDE)) {
            // CODSEDE es un array
            foreach ($request->CODSEDE as $codigoSede) {
                // Agregar la relación con cada sede
                $sede = Sede::find($codigoSede);
                if ($sede) {
                    $trabajadorA->sedes()->attach($sede->CODSEDE);
                }
            }
        } else {
            // CODSEDE es un string
            $sede = Sede::find($request->CODSEDE);
            if ($sede) {
                $trabajadorA->sedes()->attach($sede->CODSEDE);
            }
        }
    }
    public function iniciarSesion(Request $request)
    {
        $trabajador = Trabajador::where("CODTRABAJADOR", $request->codigo)->first();
        if ($trabajador) {
            $contraseñaCifrada = $trabajador->CONTRASEÑA;
            $contraseña = Crypt::decryptString($contraseñaCifrada);
            if ($request->contraseña === $contraseña) {
                return "Correcto";
            } else {
                return "Incorrecto";
            }
        } else {
            return "No";
        }
    }
}
