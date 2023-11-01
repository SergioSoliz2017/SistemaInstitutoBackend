<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;
    protected $table = "GRUPO";
    protected $fillable = ['CODCURSO', 'CODSEDE', 'NOMBREGRUPO', 'INICIOCLASES'];

    public $timestamps = false;
}
