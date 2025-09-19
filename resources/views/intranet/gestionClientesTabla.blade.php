@extends('adminlte::page')

@section('title', 'Listado de Clientes')

@section('content')
<div class="d-flex justify-content-center mt-5">
    <div class="card shadow w-100" style="max-width: 900px;">
        <div class="card-header bg-success bg-gradient text-white text-center">
            <h4 class="mb-0">Listado de Clientes</h4>
        </div>
        <div class="card-body">
            @if(isset($clientes) && $clientes->isEmpty())
                <p class="text-center">No hay clientes registrados.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-success">
                            <tr class="text-center">
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Dirección</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($clientes))
                                @foreach($clientes as $cliente)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $cliente->nombre }}</td>
                                        <td>{{ $cliente->apellidos }}</td>
                                        <td>{{ $cliente->telefono }}</td>
                                        <td>{{ $cliente->correo }}</td>
                                        <td>{{ $cliente->direccion }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('clientes.edit', $cliente->id_cliente) }}" class="btn btn-sm btn-primary">Editar</a>
                                            <form action="{{route ("clientes.destroy",$cliente->id_cliente)}}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Desea eliminar este cliente?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@stop
