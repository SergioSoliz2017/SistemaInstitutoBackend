<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;
    protected $table="REGISTRO";
    protected $primaryKey="CODINSCRIPCION";
    protected $fillable = [
    "CODTRABAJADOR",
    "FECHAINSCRIPCION",
    "COSTOINSCRIPCION","SEDE","HABILITADO"];

    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
