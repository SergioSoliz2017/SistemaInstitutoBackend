<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoInscrito extends Model
{
    use HasFactory;
    protected $table = "grupoinscrito";
    protected $primaryKey="CODGRUPOINSCRITO";
    protected $fillable = [
        "CODESTUDIANTE",
        "CODCURSOINSCRITO",
        "CODGRUPOINSCRITO",
        "NOMBREGRUPO",
        "ESTADO",
        "DIASPAGADOS",
        "FECHAINICIO"
    ];

    public $timestamps = false;

   public function horariosEstudiante()
    {
        return $this->hasMany(HorarioEstudiante::class, 'CODGRUPOINSCRITO');
    }

}
