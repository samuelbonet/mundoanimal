@extends('adminlte::page')

@section('title', 'Historial Clínico')

@section('content')
    <div class="d-flex justify-content-center mt-5">
        <div class="card shadow w-100" style="max-width: 900px;">
            <div class="card-header bg-success bg-gradient text-white text-center">
                <h4 class="mb-0">Historial Clínico</h4>
            </div>
            <div class="card-body">
                @if (isset($historiales) && $historiales->isEmpty())
                    <p class="text-center">No hay registros de historiales clínicos.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-success">
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Mascota</th>
                                    <th>Fecha Aplicación</th>
                                    <th>Vacuna</th>
                                    <th>Observaciones</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($historiales as $historial)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $historial->mascota->nombre ?? 'Sin asignar' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($historial->fecha_aplicacion)->format('d/m/Y') }}</td>
                                        <td>{{ $historial->vacuna }}</td>
                                        <td>{{ $historial->observaciones }}</td>
                                        <td class="text-center">
                                            <div
                                                style="display: inline-flex; gap: 8px; justify-content: center; align-items: center;">
                                                <a href="{{ route('historial.edit', $historial->id_historial) }}"
                                                    class="btn btn-sm btn-primary" title="Editar">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <form action="{{ route('historial.destroy', $historial->id_historial) }}"
                                                    method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Eliminar"
                                                        onclick="return confirm('¿Desea eliminar este historial?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@stop
