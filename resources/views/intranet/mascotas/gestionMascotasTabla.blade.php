@extends('adminlte::page')

@section('title', 'Listado de Mascotas')

@section('content')
    <div class="d-flex justify-content-center mt-5">
        <div class="card shadow w-100" style="max-width: 900px;">
            <div class="card-header bg-success bg-gradient text-white text-center">
                <h4 class="mb-0">Listado de Mascotas</h4>
            </div>
            <div class="card-body">
                @if ($mascotas->isEmpty())
                    <p class="text-center">No hay mascotas registradas.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-success">
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Nombre</th>
                                    <th>Especie</th>
                                    <th>Raza</th>
                                    <th>Edad</th>
                                    <th>Peso</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mascotas as $mascota)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $mascota->cliente->nombre ?? '' }} {{ $mascota->cliente->apellidos ?? '' }}
                                        </td>
                                        <td>{{ $mascota->nombre }}</td>
                                        <td>{{ $mascota->especie }}</td>
                                        <td>{{ $mascota->raza }}</td>
                                        <td>{{ $mascota->edad }}</td>
                                        <td>{{ $mascota->peso }}</td>
                                        <td class="text-center">
                                            <div
                                                style="display: inline-flex; gap: 8px; justify-content: center; align-items: center;">
                                                <a href="{{ route('mascotas.edit', $mascota->id_mascota) }}"
                                                    class="btn btn-sm btn-primary" title="Editar">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('mascotas.destroy', $mascota->id_mascota) }}"
                                                    method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Eliminar"
                                                        onclick="return confirm('¿Desea eliminar esta mascota?')">
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
