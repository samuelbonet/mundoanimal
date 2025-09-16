@extends('adminlte::page')

@section('title', 'Registrar Peluquería')

@section('content')
<div class="d-flex justify-content-center" style="min-height: 80vh; bg-gradient">
    <div class="card shadow mt-5" style="width: 100%; max-width: 500px;">
        <div class="card-header text-center bg-success bg-gradient">
            <h4 class="mb-0">Registrar Peluquería</h4>
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

            {{-- Formulario de registro de peluquería --}}
            <form action="" method="POST">
                @csrf

                {{-- Selección mascota --}}
                <div class="mb-3">
                    <label for="mascota_id" class="form-label">Mascota <span class="text-danger">*</span></label>
                    <select id="mascota_id" name="mascota_id" class="form-control" required>
                        <option value="">-- Seleccione una mascota --</option>
                        {{--@foreach($mascotas as $mascota)
                            <option value="{{ $mascota->id }}">{{ $mascota->nombre }}</option>
                        @endforeach--}}
                    </select>
                    @error('mascota_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Tipo de corte --}}
                <div class="mb-3">
                    <label for="tipo_corte" class="form-label">Tipo de Corte <span class="text-danger">*</span></label>
                    <input type="text" id="tipo_corte" name="tipo_corte" class="form-control" required>
                    @error('tipo_corte')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Baño --}}
                <div class="mb-3">
                    <label class="form-label">Baño</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="bano" name="bano">
                        <label class="form-check-label" for="bano">
                            Incluir baño
                        </label>
                    </div>
                    @error('bano')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Observaciones --}}
                <div class="mb-3">
                    <label for="observaciones" class="form-label">Observaciones</label>
                    <textarea id="observaciones" name="observaciones" class="form-control" rows="3"></textarea>
                    @error('observaciones')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Botón registrar --}}
                <div class="d-grid">
                    <button type="submit" class="btn btn-success">Registrar Peluquería</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
