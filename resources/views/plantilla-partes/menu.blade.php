
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="row w-100">
                    <!-- Authentication Links -->
            @guest

                @if(Route::has('login') || Route::has('register'))
                    <div class="col-8">
                        <a class="navbar-brand" href="{{route('inicio')}}"><img src="{{asset('imagenes/logos/logo_small.png')}}" alt="No disponibles" style="height:3.125rem;"></a>
                    </div>
                    <div class="col-4">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <ul class="navbar-nav ml-auto nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link"  href="{{route('control.index')}}">Enviar mis datos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"  href="{{route('desarrolladores')}}">Desarrolladores</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"  href="{{ route('registro.index') }}">Registrarse</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                @else
                <div class="col-9">
                    <a class="navbar-brand" href="{{route('inicio')}}"><img src="{{asset('imagenes/logos/logo_small.png')}}" alt="No disponibles" style="height: 3.125rem;"></a>
                </div>
                <div class="col-3">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-nav">
                        <ul class="navbar-nav ml-auto nav-pills">
                            <li class="nav-item">
                                <a href="{{route('home')}}" class="nav-link">Administración</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @if(Auth::user()->foto)
                                    <img src="/assets/Fotos_usuarios/{{Auth::user()->foto}}" alt="Foto usuario" style="border-radius:50%; height:4rem;">
                                @endif
                                @if(Auth::user()->foto==null || Auth::user()->foto=='')
                                    {{ Auth::user()->name }}
                                @endif
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('usuarios.show', Auth::user()->id) }}"> Mi Perfil</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        Cerrar sesión
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>  
                        </ul>
                    </div>
                </div>
            @endguest
        </div>
    </div>
</nav>