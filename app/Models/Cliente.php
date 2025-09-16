<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    //Se define campos
    protected $fillable = [
        'nombre',
        'apellidos',
        'telefono',
        'correo',
        'direccion',
    ];
}
