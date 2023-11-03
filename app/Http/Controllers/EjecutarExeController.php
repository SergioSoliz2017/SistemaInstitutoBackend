<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EjecutarExeController extends Controller
{
    public function ejecutarExe(Request $request)
    {
        $rutaAlExe = 'C:\InfinityChess\RegistrarHuella\HyuellaDigital.exe';
        $codigoEstudiante = $request->input('CODESTUDIANTE');

        $comando = "\"$rutaAlExe\" \"$codigoEstudiante\" 2>&1";
        exec($comando, $output, $exitCode);
        if ($exitCode === 0) {
            $rutaArchivo = 'C:\InfinityChess\RegistrarHuella\Huellas\\' . $codigoEstudiante . '.txt';
            if (file_exists($rutaArchivo)) {
                return "Existe";
            } else {
                return "No existe";
            }
        } else {
            return response()->json(['mensaje' => 'Error al ejecutar el archivo', 'output' => $output], 500);
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
