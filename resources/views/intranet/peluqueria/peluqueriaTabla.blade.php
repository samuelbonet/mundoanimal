@extends('adminlte::page')

@section('title', 'Listado de Peluquerías')

@section('content')
    <div class="d-flex justify-content-center mt-5">
        <div class="card shadow w-100" style="max-width: 900px;">
            <div class="card-header bg-success bg-gradient text-white text-center">
                <h4 class="mb-0">Listado de Peluquerías</h4>
            </div>
            <div class="card-body">
                @if (!isset($peluquerias) || $peluquerias->isEmpty())
                    <p class="text-center">No hay registros de peluquería.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-success text-center">
                                <tr>
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Tipo de Corte</th>
                                    <th>Hora del Corte</th>
                                    <th>Baño</th>
                                    <th>Observaciones</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($peluquerias as $peluqueria)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $peluqueria->cliente->nombre }} {{ $peluqueria->cliente->apellidos }}</td>
                                        <td>{{ $peluqueria->tipo_corte }}</td>
                                        <td class="text-center">{{ $peluqueria->hora_corte }}</td>
                                        <td class="text-center">{{ $peluqueria->bano ? 'Sí' : 'No' }}</td>
                                        <td>{{ $peluqueria->observaciones }}</td>
                                        <td class="text-center">
                                            <div
                                                style="display: inline-flex; gap: 8px; justify-content: center; align-items: center;">
                                                <a href="{{ route('peluqueria.edit', $peluqueria->id_peluqueria) }}"
                                                    class="btn btn-sm btn-primary" title="Editar">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <form action="{{ route('peluqueria.destroy', $peluqueria->id_peluqueria) }}"
                                                    method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Eliminar"
                                                        onclick="return confirm('¿Desea eliminar este registro?')">
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
