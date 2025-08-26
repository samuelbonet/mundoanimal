<!--Menu de la plantilla-->
<ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a href="{{ url('/') }}" class="nav-link">Inicio</a>
    </li>
    <li class="nav-item">
        <a href="{{ url('servicios') }}" class="nav-link">Servicios</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('contacto') }}" class="nav-link">Contacto</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('faq') }}" class="nav-link">Preguntas frecuentes</a>
    </li>
    <ul class="navbar-nav ml-auto">
        @if (Auth::check())
            <li class="nav-item dropdown">
                <a id="userDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Hola, {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="intranet">
                        Intranet
                    </a>
                    <a class="dropdown-item" href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Salir
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Intranet</a>
            </li>
        @endif
    </ul>
</ul>
