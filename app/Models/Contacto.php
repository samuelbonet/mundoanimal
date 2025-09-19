<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;

    //Nombre de la tabla asociada al modelo.
    protected $table = 'contacto';

    //Campos
    protected $fillable = [
        'campo1',
        'campo2',
        'campo3',
    ];

}
