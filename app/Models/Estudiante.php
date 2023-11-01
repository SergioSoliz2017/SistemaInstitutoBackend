<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
    protected $table="ESTUDIANTE";
    protected $primaryKey="CODESTUDIANTE";
    protected $fillable = [
    "CODESTUDIANTE",
    "CODINSCRIPCION",
    "NOMBREESTUDIANTE",
    "APELLIDOESTUDIANTE",
    "FECHANACIMIENTOESTUDIANTE",
    "GENEROESTUDIANTE",
    "DIRECCION",
    "COLEGIO",
    "TURNO",
    "CURSO",
    "TIPOCOLEGIO",
    "PAIS",
    "DEPARTAMENTO",
    "CIUDAD",
    "HABILITADO",
    "HUELLAESTUDIANTE",
    "CODSEDE"
    ];
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    public function tutores()
    {
        return $this->belongsToMany(Tutor::class, 'ESTUDIANTETUTOR', 'CODESTUDIANTE', 'CODTUTOR');
    }
}
