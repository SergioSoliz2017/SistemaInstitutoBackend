<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiantetutor extends Model
{
    use HasFactory;
    protected $table = "TUTOR";
    protected $fillable = [
        "CODTUTOR",
        "CODESTUDIANTE"];
}
