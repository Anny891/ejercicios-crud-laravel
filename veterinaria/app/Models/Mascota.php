<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    //
    protected $fillable = [
        'codigo',
        'nombre',
        'especie',
        'propietario',
        'fecha_nacimiento'
    ];
}
