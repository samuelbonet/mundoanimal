<?php
namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // Listado de la tabla
    public function index()
    {
        $clientes = Cliente::all();
        return view('intranet.gestionClientesTabla', compact('clientes'));
    }

    // Aquí mostrará formulario de edición
    public function edit(Cliente $cliente)
    {
        return view('intranet.gestionClientesFormulario', [
            'mode' => 'update',
            'cliente' => $cliente
        ]);
    }

    // Aquí eliminará del formulario al cliente
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente.');
    }

    // Muestra formulario en el que se registra a cliente
    public function create()
    {
        return view('intranet.gestionClientesFormulario', [
            'mode' => 'create',
            'cliente' => null
        ]);
    }

    // Guarda cliente nuevo
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'correo' => 'nullable|email|max:255',
            'direccion' => 'required|string|max:255',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente registrado correctamente.');
    }

    //Actualizará cliente una vez editado
    public function update(Cliente $cliente, Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'correo' => 'nullable|email|max:255',
            'direccion' => 'required|string|max:255',
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index');
    }

}
