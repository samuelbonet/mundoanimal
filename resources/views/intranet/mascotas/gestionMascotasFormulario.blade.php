@extends('adminlte::page')

@section('title', $mode == 'create' ? 'Registrar Mascota' : 'Editar Mascota')

@section('content')
<div class="d-flex justify-content-center" style="min-height: 80vh;">
    <div class="card shadow mt-5" style="width: 100%; max-width: 600px;">
        <div class="card-header text-center bg-success bg-gradient">
            <h4 class="mb-0">{{ $mode == 'create' ? 'Registrar' : 'Editar'}} Mascota</h4>
        </div>
        <div class="card-body">

            {{-- Mensaje de éxito --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            @endif

            {{-- Errores --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Formulario --}}
            <form action="{{ $mode == 'create' ? route('mascotas.store') : route('mascotas.update', $mascota?->id_mascota) }}" method="POST">
                @csrf
                @if($mode == 'edit')
                    @method('PUT')
                @endif

                {{-- Cliente --}}
                <div class="mb-3">
                    <label for="id_cliente" class="form-label">Cliente <span class="text-danger">*</span></label>
                    <select id="id_cliente" name="id_cliente" class="form-control" required>
                        <option value="" disabled selected hidden>-- Selecciona un cliente --</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id_cliente }}" @if($cliente->id_cliente == $mascota?->id_cliente) selected @endif>
                                {{ $cliente->nombre }} {{ $cliente->apellidos }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Nombre --}}
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre de la Mascota <span class="text-danger">*</span></label>
                    <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $mascota?->nombre) }}" class="form-control" required>
                </div>

                {{-- Especie --}}
                <div class="mb-3">
                    <label for="especie" class="form-label">Especie <span class="text-danger">*</span></label>
                    <select id="especie" name="especie" class="form-control" required>
                        <option value="" disabled selected hidden>-- Selecciona especie --</option>
                        @foreach (['Perro', 'Gato', 'Conejo', 'Ave', 'Granja', 'Otro'] as $especie)
                            <option value="{{ $especie }}" @if(old('especie', $mascota?->especie) == $especie) selected @endif>
                                {{ $especie }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Raza --}}
                <div class="mb-3">
                    <label for="raza" class="form-label">Raza <span class="text-danger">*</span></label>
                    <input type="text" id="raza" name="raza" value="{{ old('raza', $mascota?->raza) }}" class="form-control" required>
                </div>

                {{-- Edad --}}
                <div class="mb-3">
                    <label for="edad" class="form-label">Edad <span class="text-danger">*</span></label>
                    <input type="number" id="edad" name="edad" value="{{ old('edad', $mascota?->edad) }}" class="form-control" required min="0">
                </div>

                {{-- Peso --}}
                <div class="mb-3">
                    <label for="peso" class="form-label">Peso (kg) <span class="text-danger">*</span></label>
                    <input type="number" step="0.01" id="peso" name="peso" value="{{ old('peso', $mascota?->peso) }}" class="form-control" required min="0">
                </div>

                {{-- Botón --}}
                <div class="d-grid">
                    <button type="submit" class="btn btn-success">
                        {{ $mode == 'create' ? 'Registrar' : 'Actualizar'}} Mascota
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
