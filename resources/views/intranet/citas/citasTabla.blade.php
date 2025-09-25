@extends('adminlte::page')

@section('title', 'Listado de Citas')

@section('content')
    <div class="d-flex justify-content-center mt-5">
        <div class="card shadow w-100" style="max-width: 900px;">
            <div class="card-header bg-success bg-gradient text-white text-center">
                <h4 class="mb-0">Listado de Citas</h4>
            </div>
            <div class="card-body">
                {{-- Mensaje de éxito --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                    </div>
                @endif

                @if (isset($citas) && $citas->isEmpty())
                    <p class="text-center">No hay citas registradas.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-success">
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Teléfono</th>
                                    <th>Fecha y Hora</th>
                                    <th>Motivo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($citas as $cita)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $cita->cliente->nombre }} {{ $cita->cliente->apellidos }}</td>
                                        <td>{{ $cita->telefono }}</td>
                                        <td>{{ \Carbon\Carbon::parse($cita->fecha_aplicacion)->format('d/m/Y H:i') }}</td>
                                        <td>{{ $cita->motivo_cita }}</td>

                                        <td class="text-center">
                                            <div style="display: inline-flex; gap: 8px; justify-content: center; align-items: center;">
                                                <a href="{{ route('citas.edit', $cita->id_cita) }}"
                                                    class="btn btn-sm btn-primary" title="Editar">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <form action="{{ route('citas.destroy', $cita->id_cita) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Eliminar"
                                                        onclick="return confirm('¿Desea eliminar esta cita?')">
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
