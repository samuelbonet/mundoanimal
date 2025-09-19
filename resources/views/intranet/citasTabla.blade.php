@extends('adminlte::page')

@section('title', 'Listado de Citas')

@section('content')
<h1>Lista de Citas</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('cita.create') }}" class="btn btn-primary mb-3">Nueva Cita</a>

<table class="table table-bordered table-hover">
    <thead class="table-success">
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Teléfono</th>
            <th>Fecha y Hora</th>
            <th>Motivo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($citas as $cita)
            <tr>
                <td>{{ $cita->id_cita }}</td>
                <td>{{ $cita->cliente->nombre }} {{ $cita->cliente->apellidos }}</td>
                <td>{{ $cita->telefono }}</td>
                <td>{{ \Carbon\Carbon::parse($cita->fecha_aplicacion)->format('d/m/Y H:i') }}</td>
                <td>{{ $cita->motivo_cita }}</td>
                <td>
                    <a href="{{ route('cita.edit', $cita) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('cita.destroy', $cita) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('¿Seguro que quieres eliminar esta cita?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop
