<?php

namespace App\Http\Controllers;

use App\Models\Descuento;
use Illuminate\Http\Request;

class DescuentoController extends Controller
{
    public function obtenerDescuentosHabilitados()
    {
        try {
            // Obtener todos los descuentos habilitados
            $descuentos = Descuento::where('ESTADO', '=', 'Habilitado')->get();

            return $descuentos;
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener descuentos.'], 500);
        }
    }
}
