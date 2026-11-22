<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mascota extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'codigo',
        'nombre',
        'especie',
        'propietario',
        'fecha_nacimiento'
    ];
}
