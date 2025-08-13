<!--Barra de navegación de la plantilla-->
<nav class="main-header navbar navbar-expand-md navbar-dark">
    <div class="container-fluid">
        <a href="{{ url('/') }}" class="navbar-brand">
            <img src="{{ url('img/pagina/index/logo.png') }}" alt="Mundo Animal Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Mundo Animal</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            @include('plantilla.menu')
        </div>


    </div>
</nav>
