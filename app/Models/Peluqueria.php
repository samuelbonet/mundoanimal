<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peluqueria extends Model
{
    use HasFactory;

    //Nombre de la tabla
    protected $table = 'peluquerias';

    //Clave primaria
    protected $primaryKey = 'id_peluqueria';

    //PK autoincremental
    public $incrementing = true;

    //Clave primaria entero
    protected $keyType = 'int';

    //Campos
    protected $fillable = [
        'id_cliente',
        'mascota_id',
        'tipo_corte',
        'bano',
        'observaciones',
    ];

    //Relación: Una cita de peluquería pertenece a un cliente.
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id_cliente');
    }
}
