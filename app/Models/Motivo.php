<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motivo extends Model
{
    use HasFactory;
    protected $table="motivo";
    protected $fillable = [
        "CODTUTOR",
        "MOTIVO",
        "FECHAMOTIVO",
        "ESTADO",];

        public $timestamps = false;
}
