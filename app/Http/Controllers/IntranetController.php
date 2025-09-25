<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Mascota;
use App\Models\Cita;
use App\Models\Factura;
use App\Models\Peluqueria;
use App\Models\MensajeFormulario;

class IntranetController extends Controller
{
    public function index()
    {
        // Contadores o datos que quieras mostrar
        $clientes = Cliente::count();
        $mascotas = Mascota::count();
        $citas = Cita::where('fecha_aplicacion', '>=', now())
                     ->orderBy('fecha_aplicacion')
                     ->take(5)
                     ->get();
        $facturacionMes = Factura::whereMonth('fecha_emision', now()->month)
                                 ->sum('precio');
        $peluqueriasCount = Peluqueria::count();
        $peluquerias = Peluqueria::with('cliente')->get();
        $mensajes = MensajeFormulario::latest()->take(5)->get();

        // Enviamos todas las variables a la vista
        return view('intranet', compact(
            'clientes',
            'mascotas',
            'citas',
            'facturacionMes',
            'peluqueriasCount',
            'peluquerias',
            'mensajes'
        ));
    }
}
