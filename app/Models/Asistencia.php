<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;
    protected $table = "asistencia";
    protected $fillable = [
        "CODESTUDIANTE",
        "CODCURSOINSCRITO",
        "CODGRUPOINSCRITO",
        "ESTADO", "FECHA",
        "OBSERVACION",
        "GRUPO",
        "ENTRADA",
        "SALIDA"
    ];

    public $incrementing = false;
    public $timestamps = false;
}
