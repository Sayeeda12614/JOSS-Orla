@extends('layouts.page')
@section('content')
    <div class="container">
    <marquee behavior="" direction=""><h1 style="text-align:center; margin:0 auto; margin-top:5%; color:white;" >CONTROL DE ACCESO PARA REGISTRARSE</h1></marquee>
    
        <div class="row fila">
            
            <div class="col-12 columna">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Introduzca la clave del administrador</label><br>
                        <input type="password" name="codigo" class="form-control" placeholder="Clave"><br>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group" style="display:flex; justify-content:center;">
                                <a href="{{route('inicio')}}" class="btn btn-primary"><span class="icon-arrow-with-circle-left"></span></a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group" style="display:flex; justify-content:center;">
                                <button type="submit" class="btn btn-success"><span class="icon-arrow-with-circle-right"></span></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div> 

            @if($message = Session::get('error'))
                <div class="alert alert-danger msj_error">
                    <p>{{$message}}</p>
                </div>
            @endif    
        </div>
    </div>
@endsection