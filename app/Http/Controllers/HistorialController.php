<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Models\Historial;
use App\Models\Cliente;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    
    // Listado de la tabla
    public function index()
    {
        $historiales = Historial::with('mascota')->get();
        return view('intranet.historiales.historialClinicoTabla', compact('historiales'));
    }

    //Aquí mostrará formulario de edición
    public function edit(Historial $historial)
    {
        $mascotas = Mascota::orderBy('nombre')->get();
        return view('intranet.historiales.historialClinicoFormulario', [
            'mode' => 'update',
            'historial' => $historial,
            'mascotas' => $mascotas
        ]);
    }

    //Aquí eliminará del formulario a la mascota
    public function destroy(Historial $historial)
    {
        $historial->delete();
        return redirect()->route('historial.index');
    }

    // Muestra formulario de registro
    public function create()
    {
        $mascotas = Mascota::orderBy('nombre')->get();
        return view('intranet.historiales.historialClinicoFormulario', [
            'mode' => 'create',
            'historial'=> null,
            'mascotas' => $mascotas
        ]);
    }

    // Guardar historial nueva
    public function store(Request $request)
    {
        $request->validate([
            'id_mascota' => 'required|exists:mascotas,id_mascota',
            'fecha_aplicacion'     => 'required|date',
            'vacuna'    => 'required|string|max:50',
            'observaciones'       => 'nullable|string|max:100',
        ]);

        Historial::create($request->all());

        return redirect()->route('historial.index');
    }

    //Actualiza historial
    public function update(Historial $historial, Request $request)
    {
        $request->validate([
            'id_mascota' => 'required|exists:mascotas,id_mascota',
            'fecha_aplicacion'     => 'required|date',
            'vacuna'    => 'required|string|max:50',
            'observaciones'       => 'nullable|string|max:100',
        ]);

        $historial->update($request->all());

        return redirect()->route('historial.index');
    }

}
