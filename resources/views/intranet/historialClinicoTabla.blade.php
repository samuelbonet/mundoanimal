@extends('adminlte::page')

@section('title', 'Historial Clínico')

@section('content')
<div class="d-flex justify-content-center mt-5">
    <div class="card shadow w-100" style="max-width: 900px;">
        <div class="card-header bg-success bg-gradient text-white text-center">
            <h4 class="mb-0">Historial Clínico</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-success">
                        <tr class="text-center">
                            <th>#</th>
                            <th>Mascota</th>
                            <th>Fecha Aplicación</th>
                            <th>Vacuna</th>
                            <th>Observaciones</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($historiales as $historial)
                                <tr>
                                    <td class="text-center">{{ $historial->id_historial }}</td>
                                    <td>{{ $historial->mascota->nombre }} </td>
                                    <td>{{ $historial->fecha_aplicacion }}</td>
                                    <td>{{ $historial->vacuna }}</td>
                                    <td>{{ $historial->observaciones }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('historial.edit', $historial->id_historial) }}" class="btn btn-sm btn-primary">Editar</a>
                                        <form action="{{ route('historial.destroy', $historial->id_historial) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Desea eliminar este historial?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
