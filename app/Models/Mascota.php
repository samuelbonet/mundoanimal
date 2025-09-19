<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;

    //Clave primaria
    protected $primaryKey = 'id_mascota';

    //Campos
    protected $fillable = [
        'id_cliente',
        'nombre',
        'especie',
        'raza',
        'edad',
        'peso',
    ];

    //Relación: una mascota pertenece a un cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id_cliente');
    }
}
