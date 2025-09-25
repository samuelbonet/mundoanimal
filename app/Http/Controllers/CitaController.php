<?php

namespace App\Http\Controllers;
use App\Models\Cita;
use App\Models\Mascota;
use App\Models\Cliente;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    
    // Listado de la tabla
    public function index()
    {
        $citas = Cita::with('cliente')->get();
        return view('intranet.citas.citasTabla', compact('citas'));
    }

    //Aquí mostrará formulario de edición
    public function edit(Cita $cita)
    {
        $clientes = Cliente::orderBy('nombre')->get();
        return view('intranet.citas.citasFormulario', [
            'mode' => 'update',
            'cita' => $cita,
            'clientes' => $clientes
        ]);
    }


    //Aquí eliminará del formulario a la mascota
    public function destroy(Cita $cita)
    {
        $cita->delete();
        return redirect()->route('citas.index');
    }

    // Muestra formulario en el que se registra una mascota
    public function create()
    {
        $clientes = Cliente::orderBy('nombre')->get();
        return view('intranet.citas.citasFormulario', [
            'mode'=> 'create',
            'cita' => null,
            'clientes' => $clientes
        ]);
    }

    // Guardar mascota nueva
    public function store(Request $request)
    {
        $request->validate([
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'telefono' => 'required|string|max:20',
            'fecha_aplicacion'     => 'required|date',
            'motivo_cita'       => 'required|string|max:100',
        ]);

        Cita::create($request->all());

        return redirect()->route('citas.index');
    }

    //Actualizará mascota una vez editado
    public function update(Cita $cita, Request $request)
    {
        $request->validate([
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'telefono' => 'required|string|max:20',
            'fecha_aplicacion'     => 'required|date',
            'motivo_cita'       => 'required|string|max:100',
            
        ]);

        $cita->update($request->all());

        return redirect()->route('citas.index');
    }

}
