<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tarea extends Model
{
    //
    Use HasFactory;
    protected $fillable = [
        'titulo',
        'descripcion',
        'responsable',
        'fecha_limite',
        'estado'
    ];
}
