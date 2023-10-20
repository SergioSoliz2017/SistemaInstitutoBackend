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
        $descriptorspec = array(
            0 => array("pipe", "r"),  // stdin
            1 => array("pipe", "w"),  // stdout
            2 => array("pipe", "w")   // stderr
        );

        $process = proc_open("start /B " . $rutaAlExe, $descriptorspec, $pipes);

        // Cerrar los descriptores de archivo no necesarios
        fclose($pipes[0]);
        fclose($pipes[1]);
        fclose($pipes[2]);

        // Liberar el control del proceso
        proc_close($process);

        // Devolver una respuesta rápida
        return response()->json(['mensaje' => 'Ejecución del archivo iniciada'], 200);
    }

    public function ejecutarExeVerificar()
    {
        // Ruta al archivo .exe
        $rutaAlExe = 'C:\Users\sergb\source\repos\VerificarHuella\VerificarHuella\bin\Debug\VerificarHuella.exe';

        $descriptorspec = array(
            0 => array("pipe", "r"),  // stdin
            1 => array("pipe", "w"),  // stdout
            2 => array("pipe", "w")   // stderr
        );

        $process = proc_open("start /B " . $rutaAlExe, $descriptorspec, $pipes);

        // Cerrar los descriptores de archivo no necesarios
        fclose($pipes[0]);
        fclose($pipes[1]);
        fclose($pipes[2]);

        // Liberar el control del proceso
        proc_close($process);

        // Devolver una respuesta rápida
        return response()->json(['mensaje' => 'Ejecución del archivo iniciada'], 200);
    }
}
