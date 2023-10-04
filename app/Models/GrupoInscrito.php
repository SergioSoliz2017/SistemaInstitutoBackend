<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoInscrito extends Model
{
    use HasFactory;
    protected $table="grupoinscrito";
    protected $fillable = [
    "CODCURSOINSCRITO",
    "CANTIDADMAXIMA",
    "NOMBREGRUPO",];

    public $timestamps = false;
}
