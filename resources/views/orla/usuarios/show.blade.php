@extends('layouts.page')
@section('content')

<div class="container mt-5">
    <div class="row fila">
        <h2>PERFIL DE {{$usuario->name}} {{$usuario->apellidos}}</h2>
        <div class="col-12 columna">
            <div class="form-group imagen">
                @if($usuario->foto==null || $usuario->foto=='')
                    <img src="/assets/Fotos_integrantes/placeholder.png" alt="Foto usuario">
                @endif 
                @if($usuario->foto!=null || $usuario->foto!='') 
                    <img src="/assets/Fotos_usuarios/{{$usuario->foto}}" alt="Foto usuario">
                @endif  
            </div>
            <div class="form-group">
                <p class="form-control">{{$usuario->name}}</p>
            </div>
            <div class="form-group">
                <p class="form-control">{{$usuario->apellidos}}</p>
            </div>
            <div class="form-group">
                <p class="form-control">{{$usuario->tipo}}</p>
            </div>
            <div class="form-group">
                <p class="form-control">{{$usuario->email}}</p>
            </div>
            <div class="form-group boton">
                <a href="{{route('usuarios.edit',Auth::user()->id)}}" class="btn btn-info m-5">Actualizar perfil</a>
            </div>
        </div>
        
        @if($message = Session::get('success'))
                <div class="alert alert-success mensaje w-50" style="margin:0 auto;">
                    <p style="text-align:center; margin:0 auto;">{{$message}}</p>
                </div>
        @endif
    </div>
</div>
@endsection