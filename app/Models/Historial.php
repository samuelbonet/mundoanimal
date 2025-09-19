<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;

    
    //Nombre de la tabla en la base de datos.
    protected $table = 'historial';

    //Clave primaria personalizada
    protected $primaryKey = 'id_historial';

     //Con $guarded vacío, significa que todos los campos son asignables
    protected $guarded = [];

    //Relación: un historial pertenece a una mascota.
    public function mascota()
    {
        return $this->belongsTo(Mascota::class, 'id_mascota', 'id_mascota');
    }
}
