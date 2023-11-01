<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    use HasFactory;
    protected $table = "DESCUENTO";
    protected $primaryKey = "CODDESCUENTO";
    protected $fillable = [
        "CODDESCUENTO",
        "NOMBREDESCUENTO",
        "ESTADO",
        "TIPO",
        "CANTIDAD",
    ];

    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
