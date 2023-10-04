<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursoInscrito extends Model
{
    use HasFactory;
    protected $table="cursoinscrito";
    protected $primaryKey="CODCURSOINSCRITO";
    protected $fillable = [
    "CODCURSOINSCRITO",
    "CODESTUDIANTE",
    "CURSOINSCRITO",
    "DURACIONCURSO",];

    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
