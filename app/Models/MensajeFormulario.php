<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MensajeFormulario extends Model
{
    use HasFactory;

    //Nombre de la tabla
    protected $table = "mensajes_formulario";

    //Campos
    protected $guarded = [];
}
