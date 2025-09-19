<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    // Nombre de la tabla 
    protected $table = 'clientes';

    // Clave primaria 
    protected $primaryKey = 'id_cliente';

    // Campos
    protected $fillable = [
        'nombre',
        'apellidos',
        'telefono',
        'correo',
        'direccion',
    ];

    public function citas()
    {
        return $this->hasMany(Cita::class, 'id_cliente', 'id_cliente');
    }

    public function facturas()
    {
        return $this->hasMany(Factura::class, 'id_cliente', 'id_cliente');
    }

    public function peluquerias()
    {
        return $this->hasMany(Peluqueria::class, 'id_cliente', 'id_cliente');
    }
}
