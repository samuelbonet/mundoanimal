@extends('adminlte::page')

@section('title', $mode === 'create' ? 'Registrar Peluquería' : 'Editar Peluquería')

@section('content')
<div class="d-flex justify-content-center" style="min-height: 80vh;">
    <div class="card shadow mt-5" style="width: 100%; max-width: 500px;">
        <div class="card-header text-center bg-success bg-gradient">
            <h4 class="mb-0">{{ $mode === 'create' ? 'Registrar' : 'Editar'}} Peluquería</h4>
        </div>
        <div class="card-body">

            {{-- Mensaje de éxito --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            @endif

            {{-- Errores --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Formulario --}}
            <form action="{{ $mode === 'create' ? route('peluqueria.store') : route('peluqueria.update', $peluqueria->id_peluqueria) }}" method="POST">
                @csrf
                @if($mode === 'update')
                    @method('POST') {{-- mantenemos POST para actualizar --}}
                @endif

                {{-- Cliente --}}
                <div class="mb-3">
                    <label for="id_cliente" class="form-label">Cliente <span class="text-danger">*</span></label>
                    <select id="id_cliente" name="id_cliente" class="form-control" required>
                        <option value="" disabled selected hidden>-- Selecciona un cliente --</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id_cliente }}" 
                                {{ old('id_cliente', $peluqueria?->id_cliente) == $cliente->id_cliente ? 'selected' : '' }}>
                                {{ $cliente->nombre }} {{ $cliente->apellidos }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_cliente')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Tipo de corte --}}
                <div class="mb-3">
                    <label for="tipo_corte" class="form-label">Tipo de Corte <span class="text-danger">*</span></label>
                    <input type="text" id="tipo_corte" name="tipo_corte" class="form-control"
                        value="{{ old('tipo_corte', $peluqueria?->tipo_corte) }}" required>
                    @error('tipo_corte')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Baño --}}
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="bano" name="bano"
                            {{ old('bano', $peluqueria?->bano) ? 'checked' : '' }}>
                        <label class="form-check-label" for="bano">Incluir baño</label>
                    </div>
                    @error('bano')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Observaciones --}}
                <div class="mb-3">
                    <label for="observaciones" class="form-label">Observaciones</label>
                    <textarea id="observaciones" name="observaciones" class="form-control" rows="3">{{ old('observaciones', $peluqueria?->observaciones) }}</textarea>
                    @error('observaciones')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Botón --}}
                <div class="d-grid">
                    <button type="submit" class="btn btn-success">{{ $mode === 'create' ? 'Registrar' : 'Actualizar'}} Peluquería</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
