@extends('layouts.page')
@section('content')
    
    <div class="container mt-5">
        <form action="{{route('usuarios.update',$usuario->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row fila">
                <h2>Editar {{$usuario->name}}</h2>
                <div class="col-12 columna">
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
                        <input type="file" name="foto" class="form-control" value="{{$usuario->foto}}" required>
                    </div>

                    <div class="form-group">
                        <label for="">Tipo de usuario</label>
                        <input type="text" name="tipo" class="form-control" value="{{$usuario->tipo}}" disabled>
                    </div>

                    <div class="form-group">
                        <input type="text" name="email" class="form-control" value="{{$usuario->email}}" disabled>
                    </div>

                    <div class="form-group" style="display: flex; justify-content:space-around">
                        <a href="{{route('usuarios.show',$usuario->id)}}" class="btn btn-secondary"><span class="icon-arrow-with-circle-left btn_iconos"></span></a>
                        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o btn_iconos" aria-hidden="true"></i></button>
                    </div> 
                </div>
            </div>
        </form>
    </div>
@endsection