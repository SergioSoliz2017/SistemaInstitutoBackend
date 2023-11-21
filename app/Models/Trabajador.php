<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    use HasFactory;
    protected $table = "trabajador";
    protected $primaryKey = "CODTRABAJADOR";
    protected $fillable = [
        "CODTRABAJADOR",
        "CODSEDE",
        "NOMBRETRABAJADOR",
        "FECHANACIMIENTOTRABAJADOR",
        "ROLTRABAJADOR",
        "CONTRASEÑA",
        "ESTADO",
    ];
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    public function sedes()
    {
        return $this->belongsToMany(Sede::class, 'trabajadorsede', 'CODTRABAJADOR', 'CODSEDE');
    }
}
