@extends('layouts.page')
@section('content')
    
    <div class="container">
        <form action="{{route('usuarios.update',$usuario->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row fila">
                <h2>Editar {{$usuario->name}}</h2>
                <div class="col-6 columna">
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" name="name" class="form-control" value="{{$usuario->name}}" placeholder="Nombre">
                    </div>

                    <div class="form-group">
                        <label for="">Apellidos</label>
                        <input type="text" name="apellidos" class="form-control" value="{{$usuario->apellidos}}" placeholder="Apellidos">
                    </div>

                    <div class="form-group">
                        <label for="">Foto perfil</label>
                        <input type="file" name="foto" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Tipo de usuario</label>
                        <input type="text" name="tipo" class="form-control" value="{{$usuario->tipo}}" disabled>
                    </div>

                    <div class="form-group">
                        <input type="text" name="email" class="form-control" value="{{$usuario->email}}" disabled>
                    </div>

                    <div class="form-group boton">
                        <a href="{{route('usuarios.show',$usuario->id)}}" class="btn btn-warning m-2">Volver</a>
                        <button type="submit" class="btn btn-success m-2">Guardar</button>
                    </div> 
                </div>
            </div>
        </form>
    </div>
@endsection