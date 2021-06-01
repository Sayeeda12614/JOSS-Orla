@extends('layouts.page')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            @if($message = Session::get('success'))
            <div class="alert alert-success msj_exito">
                <p>{{$message}}</p>
            </div>
            @endif
            @if($message = Session::get('error'))
            <div class="alert alert-danger msj_error">
                <p>{{$message}}</p>
            </div>
            @endif
        </div>
        <div class="col-12">
        @if(Auth::user())
            <marquee class="saludo_user"><h2>Bienvenid@ {{Auth::user()->tipo}}/a</h2></marquee> 
        @endif
        </div>
    </div>



    <div class="row opciones">
        @if(Auth::user()->tipo=='tutor')
            <div class="col-12  btn_opciones">
                <a href="{{ route('integrantes.index')}}">
                    <form action="{{ route('integrantes.index') }}" method="GET">
                        @csrf
                        <input type="hidden" name="tutor" value="{{Auth::user()->id}}">
                        <button type="submit"class="btn btn-default" >Mi grupo</button>
                    </form>  
                </a>
                <a href="{{ route('claves.index')}}">
                    <form action="{{ route('claves.index') }}" method="GET">
                        @csrf
                        <input type="hidden" name="tutor" value="{{Auth::user()->id}}">
                        <button type="submit" class="btn btn-default" >Mis Claves</button>
                    </form>  
                </a>
            </div>
            
        @endif
        @if(Auth::user()->tipo=='administrador')
            <div class="col-12 btn_opciones">
                <a class="btn btn-default" href="{{ route('cursos.index')}}"><button class="btn btn-default" >Cursos</button></a>
                <a class="btn btn-default" href="{{ route('ciclos.index')}}"><button class="btn btn-default" >Ciclos</button></a>
                <a class="btn btn-default" href="{{ route('claves_registro.index')}}"><button class="btn btn-default" >Claves Registro</button></a>
                <a class="btn btn-default" href="{{ route('usuarios.index')}}"><button class="btn btn-default" >Usuarios</button></a>
            </div>
        @endif

        
    </div>
</div>


 
@endsection
