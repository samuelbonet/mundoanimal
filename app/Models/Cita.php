<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    // Nombre de la tabla 
    protected $table = 'citas';

    // Definición de la clave primaria 
    protected $primaryKey = 'id_cita';

    // Campos 
    protected $fillable = [
        'id_cliente',
        'telefono',
        'fecha_aplicacion',
        'motivo_cita',
    ];

    // Convierte el campo a tipo datetime
    protected $casts = [
        'fecha_aplicacion' => 'datetime',
    ];

    /**
     * Relación con modelo Cliente:
     * Una cita pertenece a un cliente (N citas -> 1 cliente)
     * Se enlaza la FK id_cliente en citas, con la PK id_cliente en clientes
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id_cliente');
    }
}
