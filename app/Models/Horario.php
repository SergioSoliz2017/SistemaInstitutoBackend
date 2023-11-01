<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    protected $table = "HORARIO";
    protected $fillable = [
        "CODSEDE",
        "CODCURSO",
        "DIA",
        "HORA",
        "GRUPO"
    ];

    public $timestamps = false;
}
