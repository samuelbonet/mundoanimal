<div class="container my-5">
    <div class="row g-4 align-items-center">
        <!-- Información de contacto -->
        <div class="col-lg-6 col-md-12">
            <h2 class="mb-4">Contáctanos</h2>
            <p class="mb-4">Llámanos, visítanos o 
            envíanos un mensaje a través de nuestro correo o formulario de contacto.</p>

            <ul class="list-unstyled">
                <li class="mb-3">
                    <i class="fas fa-map-marker-alt text-success me-2"></i>
                    <strong>Dirección:</strong> Calle Veterinaria 123, Zaragoza, España
                </li>
                <li class="mb-3">
                    <i class="fas fa-phone-alt text-success me-2"></i>
                    <strong>Teléfono:</strong> 900 123 456
                </li>
                <li class="mb-3">
                    <i class="fas fa-envelope text-success me-2"></i>
                    <strong>Email:</strong> <a href="mailto:info@mundoanimal.com" class="text-decoration-none">info@mundoanimal.com</a>
                </li>
                <li class="mb-3">
                    <i class="fas fa-clock text-success me-2"></i>
                    <strong>Horario:</strong> Lunes - Viernes: 9:00 - 20:00, Sábado: 10:00 - 14:00 <br>
                    También contamos con Servicio de Guardia 24h
                </li>
            </ul>
        </div>

        <!-- Mapa -->
        <div class="col-lg-6 col-md-12">
            <div class="ratio ratio-16x9 shadow rounded">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d47699.00505776757!2d-0.9361805133677864!3d41.65168389418877!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd5914dd5e618e91%3A0x49df13f1158489a8!2sZaragoza!5e0!3m2!1ses!2ses!4v1755163206208!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>



<div class="card card-secondary w-75 mx-auto">
    <!-- cabecera del formulario-->
    <div class="card-header bg-dark">
        <h3 class="card-title ">Formulario de contacto</h3>
    </div>

    <!-- formulario de contacto-->
    <form action= "{{ url('contacto/enviar') }}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Nombre *</label><!--Nombre-->
                <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                    placeholder="Introduzca un nombre" value="{{ old('nombre') }}">
                @error('nombre')
                    <div class="text-red">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Apellido *</label><!--Apellido-->
                <input type="text" name="apellido" class="form-control"
                    placeholder="Introduzca un apellido" value="{{ old('apellido') }}">
                @error('apellido')
                    <div class="text-red">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label >Correo Electrónico *</label><!--Correo electrónico-->
                <input type="text" name="correo" class="form-control"
                    placeholder="Introduzca una dirección de correo válida" value="{{ old('correo') }}">
                @error('correo')
                    <div class="text-red">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Mensaje *</label><!--Mensaje-->
                <textarea name="mensaje" class="form-control" rows="3" placeholder="Introduzca su mensaje">{{ old('mensaje') }}</textarea>
                @error('mensaje')
                    <div class="text-red">{{ $message }}</div>
                @enderror
            </div>
            <span>* Campos obligatorios</span>
        </div>


        <!-- footer del formulario -->
        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn-lg btn-secondary bg-dark">Enviar</button>
                </div>
                <div class="col text-right">
                    <button type="reset" class="btn-lg btn-secondary bg-dark">Vaciar formulario</button>
                </div>                
            </div>
        </div>

    </form>
    <!-- final del formulario -->
</div>
