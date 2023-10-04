<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;
    protected $table="tutor";
    protected $primaryKey="CODTUTOR";
    protected $fillable = [
    "CODTUTOR",
    "NOMBRETUTOR",
    "APELLIDOTUTOR",
    "FECHANACIMIENTOTUTOR",
    "CELULARTUTOR",
    "GENEROTUTOR",
    "CORREO",
    "OCUPACION",
    "RELACION",
    "ESTADO"
    ];
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class, 'estudiantetutor', 'CODTUTOR', 'CODESTUDIANTE');
    }
}
