<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $table = "CURSO";
    protected $primaryKey = "CODCURSO";
    protected $fillable = [
        "CODCURSO",
        "CODSEDE ",
        "CURSO",
        "PRECIO",
        "DURACIONCURSO"
    ];

    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
