<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EjecutarExeController extends Controller
{
    public function ejecutarExe()
    {
        $rutaAlExe = 'C:\Users\sergb\source\repos\HyuellaDigital\HyuellaDigital\bin\Debug\HyuellaDigital.exe';
        exec($rutaAlExe, $output, $exitCode);
        if ($exitCode === 0) {
            return "Se cerro";
        } else {
            return response()->json(['mensaje' => 'Error al ejecutar el archivo'], 500);
        }
    }

    public function ejecutarExeVerificar(Request $request)
    {
        $sede = $request->SEDE;
        $rutaAlExe = 'C:\Users\sergb\source\repos\VerificarHuella\VerificarHuella\bin\Debug\VerificarHuella.exe';
        $comando = "start /B $rutaAlExe $sede";
        $descriptorspec = array(
            0 => array("pipe", "r"),  // stdin
            1 => array("pipe", "w"),  // stdout
            2 => array("pipe", "w")   // stderr
        );
        $process = proc_open($comando, $descriptorspec, $pipes);
        fclose($pipes[0]);
        fclose($pipes[1]);
        fclose($pipes[2]);
        proc_close($process);
        return response()->json(['mensaje' => 'Ejecución del archivo iniciada'], 200);
    }
}
