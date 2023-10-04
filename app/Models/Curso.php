<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $table="curso";
    protected $primaryKey="CODCURSO";
    protected $fillable = [
    "CODCURSO",
    "CODINSCRIPCION",
    "CURSO",
    "DURACIONCURSO",];

    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
