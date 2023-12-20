<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorarioEstudiante extends Model
{
    use HasFactory;
    protected $table = "horarioestudiante";
    protected $fillable = [
        "CODESTUDIANTE",
        "CODCURSOINSCRITO",
        "CODGRUPOINSCRITO",
        "DIA",
        "HORA",
    ];

    public $timestamps = false;

    public function grupoInscrito()
    {
        return $this->belongsTo(GrupoInscrito::class, 'CODGRUPOINSCRITO');
    }
}
