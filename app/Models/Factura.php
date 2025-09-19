<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    
    //Nombre de la tabla en la base de datos.
    protected $table = 'facturas';

    //Clave primaria
    protected $primaryKey = 'id_factura';

    //Campos
    protected $fillable = [
        'id_cliente',
        'fecha_emision',
        'concepto',
        'precio',
    ];

    //Hacemos un casting para la fecha
    protected $casts = [
        'fecha_emision' => 'datetime',
    ];

    
    //Relación: una factura pertenece a un cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id_cliente');
    }
}
