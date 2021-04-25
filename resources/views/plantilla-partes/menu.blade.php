
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="row w-100">
        <div class="col-6">
            <a class="navbar-brand" href="#"><img src="./imagenes/logos/logo_small.png" alt="No disponibles" style="width:200px; height: 50px;"></a>
        </div>
        <div class="col-6">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <ul class="navbar-nav ml-auto nav-pills">
                                
                    <!-- Authentication Links -->
                    @guest
                    
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  href="{{route('control.index')}}">Ir a enviar mis datos</a>
                            </li>
                        @endif
                    
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link"  href="{{ route('registro.index') }}">Registrarse</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Bienvenid@: {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                            <!-- si el usuario logueado es tutor -->
                            @if(Auth::user()->tipo=='tutor')
                                <li class="nav-item dropdown">
                                
                                    <a class="nav-link" href="{{ route('integrantes.index')}}">
                                        <form action="{{ route('integrantes.index') }}" method="GET">
                                            @csrf
                                            <input type="hidden" name="tutor" value="{{Auth::user()->id}}">
                                            <button type="submit" class="btn btn-default nav-link">Mi grupo</button>
                                        </form>  
                                    </a>  
                                </li>
                                <li class="nav-item dropdown">

                                    <a class="nav-link" href="{{ route('claves.index')}}">
                                        <form action="{{ route('claves.index') }}" method="GET">
                                            @csrf
                                            <input type="hidden" name="tutor" value="{{Auth::user()->id}}">
                                            <button type="submit" class="btn btn-default nav-link">Mis Claves</button>
                                        </form>  
                                    </a>
                                </li>
                            @endif
                            <!-- si el usuario logueado es tutor -->
                            @if(Auth::user()->tipo=='administrador')
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Administrar
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('cursos.index')}}">Curso</a>
                                    <a class="dropdown-item" href="{{ route('ciclos.index')}}">Ciclos</a>
                                    <a class="dropdown-item" href="{{ route('claves_registro.index')}}">Claves Registro</a>
                                    {{-- <a class="dropdown-item" href="{{ route('user')}}">Usuarios</a> --}}
                                    </div>
                                </li>
                                {{-- <li class="nav-item dropdown"><a href="" class="btn btn-default nav-link">Administrar</a></li> --}}
                            @endif
                        
                    @endguest
                   
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>