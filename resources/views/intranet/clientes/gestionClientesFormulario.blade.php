@extends('adminlte::page')

@section('title', 'Registrar cliente')

@section('content')
<div class="d-flex justify-content-center" style="min-height: 80vh; bg-gradient">
    <div class="card shadow mt-5" style="width: 100%; max-width: 500px;">
        <div class="card-header text-center bg-success bg-gradient">
            <h4 class="mb-0">{{ $mode == 'create' ? 'Registrar' : 'Editar'}} Cliente </h4>
        </div>
        <div class="card-body">
            
            {{-- Mensaje de éxito --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            @endif

            {{-- Errores generales --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Formulario de registro de cita --}}
            <form action="{{ $mode == 'create' ? route('clientes.store') : route('clientes.update', $cliente?->id_cliente) }}" method="POST">
                @csrf

                {{-- Nombre --}}
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre <span class="text-danger">*</span></label>
                    <input type="text" id="nombre" name="nombre" value="{{ $cliente?->nombre }}" class="form-control" required>
                    @error('nombre')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Apellidos --}}
                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos <span class="text-danger">*</span></label>
                    <input type="text" id="apellidos" name="apellidos" value="{{ $cliente?->apellidos }}" class="form-control" required>
                    @error('apellidos')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                {{-- Teléfono --}}
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono <span class="text-danger">*</span></label>
                    <input type="text" id="telefono" name="telefono" value="{{ $cliente?->telefono}}" class="form-control" required>
                    @error('telefono')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Correo electrónico --}}
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo electrónico</label>
                    <input type="email" id="correo" name="correo" value="{{ $cliente?->correo }}" class="form-control">
                    @error('correo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Dirección --}}
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección <span class="text-danger">*</span></label>
                    <input type="text" id="direccion" name="direccion" value="{{ $cliente?->direccion }}" class="form-control" required>
                    @error('direccion')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Botón registrar --}}
                <div class="d-grid">
                    <button type="submit" class="btn btn-success">
                        {{ $mode == 'create' ? 'Registrar' : 'Editar'}} Cliente
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
