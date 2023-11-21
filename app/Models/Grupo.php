<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;
    protected $table = "grupo";
    protected $primaryKey="CODGRUPO";
    protected $fillable = [
        'CODCURSO',
        'CODSEDE',
        'NOMBREGRUPO',
        'PRECIO',
        'CODGRUPO',
        'ESTADO',
        'LIMITE'
    ];

    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
