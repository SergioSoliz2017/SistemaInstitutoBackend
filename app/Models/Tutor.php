<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;
    protected $table = "tutor";
    protected $primaryKey = "CODTUTOR";
    protected $fillable = [
        "CODTUTOR",
        "NOMBRETUTOR",
        "APELLIDOTUTOR",
        "FECHANACIMIENTOTUTOR",
        "CELULARTUTOR",
        "CELULARALTERNATIVO",
        "GENEROTUTOR",
        "CORREO",
        "OCUPACION",
        "ESTADO"
    ];
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class, 'ESTUDIANTETUTOR', 'CODTUTOR', 'CODESTUDIANTE')->select(
            'ESTUDIANTE.CODESTUDIANTE',
            'ESTUDIANTE.CODINSCRIPCION',
            'ESTUDIANTE.NOMBREESTUDIANTE',
            'ESTUDIANTE.APELLIDOESTUDIANTE',
            'ESTUDIANTE.FECHANACIMIENTOESTUDIANTE',
            'ESTUDIANTE.GENEROESTUDIANTE',
            'ESTUDIANTE.DIRECCION',
            'ESTUDIANTE.COLEGIO',
            'ESTUDIANTE.TURNO',
            'ESTUDIANTE.CURSO',
            'ESTUDIANTE.TIPOCOLEGIO',
            'ESTUDIANTE.PAIS',
            'ESTUDIANTE.DEPARTAMENTO',
            'ESTUDIANTE.CIUDAD',
            'ESTUDIANTE.HABILITADO',
            'ESTUDIANTE.CODSEDE'
        )->withPivot('RELACION');
    }
}
