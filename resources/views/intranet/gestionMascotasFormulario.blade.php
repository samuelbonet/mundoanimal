@extends('adminlte::page')

@section('title', 'Registrar Mascota')

@section('content')
<div class="d-flex justify-content-center" style="min-height: 80vh;">
    <div class="card shadow mt-5" style="width: 100%; max-width: 600px;">
        <div class="card-header text-center bg-success bg-gradient">
            <h4 class="mb-0">Registrar Mascota</h4>
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

            {{-- Formulario de registro de mascota --}}
            <form action="{{ route('mascotas.store') }}" method="POST">
                @csrf

                {{-- Cliente --}}
                <div class="mb-3">
                    <label for="id_cliente" class="form-label">Cliente</label>
                    <select id="id_cliente" name="id_cliente" class="form-control" required>
                        <option value="">-- Selecciona un cliente --</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nombre }} {{ $cliente->apellidos }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Nombre mascota --}}
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre de la Mascota</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" required>
                </div>

                {{-- Especie --}}
                <div class="mb-3">
                    <label for="especie" class="form-label">Especie</label>
                    <select id="especie" name="especie" class="form-control" required>
                        <option value="">-- Selecciona especie --</option>
                        <option value="Perro">Perro</option>
                        <option value="Gato">Gato</option>
                        <option value="Conejo">Conejo</option>
                        <option value="Ave">Ave</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>

                {{-- Raza --}}
                <div class="mb-3">
                    <label for="raza" class="form-label">Raza</label>
                    <input type="text" id="raza" name="raza" class="form-control">
                </div>

                {{-- Edad --}}
                <div class="mb-3">
                    <label for="edad" class="form-label">Edad</label>
                    <input type="number" id="edad" name="edad" class="form-control">
                </div>

                {{-- Peso --}}
                <div class="mb-3">
                    <label for="peso" class="form-label">Peso (kg)</label>
                    <input type="number" step="0.01" id="peso" name="peso" class="form-control">
                </div>

                {{-- Botón registrar --}}
                <div class="d-grid">
                    <button type="submit" class="btn btn-success">Registrar Mascota</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
