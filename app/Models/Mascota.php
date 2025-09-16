<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;

    //Se define clave primaria
    protected $primaryKey = 'id_mascota';

    //Se define campos
    protected $fillable = [
        'id_cliente',
        'nombre',
        'especie',
        'raza',
        'edad',
        'peso',
    ];

    public function cliente()
    {
        //id_cliente es de la tabla mascotas que hace referencia a tabla clientes
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
