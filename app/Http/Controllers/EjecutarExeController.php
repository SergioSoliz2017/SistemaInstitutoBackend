<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;

class EjecutarExeController extends Controller
{
    public function ejecutarExe()
    {
        // Ruta al archivo .exe
        $rutaAlExe = 'C:\Users\sergb\source\repos\HyuellaDigital\HyuellaDigital\bin\Debug\HyuellaDigital.exe';

        // Ejecutar el archivo .exe
        exec($rutaAlExe, $output, $exitCode);

        if ($exitCode === 0) {
            return "Se cerro";
        } else {
            return response()->json(['mensaje' => 'Error al ejecutar el archivo'], 500);
        }
    }

    public function ejecutarExeVerificar()
    {
        // Ruta al archivo .exe
        $rutaAlExe = 'C:\Users\sergb\source\repos\VerificarHuella\VerificarHuella\bin\Debug\VerificarHuella.exe';

        // Ejecutar el archivo .exe
        exec($rutaAlExe, $output, $exitCode);

        if ($exitCode === 0) {
            return "Se cerro";
        } else {
            return response()->json(['mensaje' => 'Error al ejecutar el archivo'], 500);
        }
    }


}
