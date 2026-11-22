<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\Factories\HasFactory;

class Libro extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'codigo',
        'titulo',
        'autor',
        'anio_publicacion'

    ];
}
