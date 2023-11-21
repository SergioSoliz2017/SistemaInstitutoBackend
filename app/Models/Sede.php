<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;
    protected $table="sede";
    protected $primaryKey="CODSEDE";
    protected $fillable = [
    "CODSEDE",
    "UBICACION",
    "NOMBRESEDE",];
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    public function trabajadores()
    {
        return $this->belongsToMany(Trabajador::class, 'trabajadorsed', 'CODTRABAJADOR', 'CODSEDE');
    }
}
