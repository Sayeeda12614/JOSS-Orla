@extends('layouts.page')
@section('content')
    <div class="container mt-5">
    <marquee behavior="" direction=""><h1>CONTROL DE ACCESO PARA ENVIAR DATOS</h1></marquee>
    
        <div class="row fila">
            
            <div class="col-12 columna">
                <form action="{{route('control.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <img src="../imagenes/logos/stop.jpg" style="height:7rem; display:flex; justify-content:center; margin:0 auto;" alt="">
                        <label for="" style="text-align:center; margin:0 auto; width:100%">Introduzca la clave de tu tutor/a</label><br>
                        <input type="password" name="codigo" class="form-control" placeholder="Clave"><br>
                        
                    </div>
                    <div class="row ">
                        <div class="col-6">
                            <div class="form-group" style="display:flex; justify-content:center;">
                                <a href="{{route('inicio')}}" class="btn btn-warning"><span class="icon-arrow-with-circle-left btn_iconos"></span></a>
                            </div>
                        </div>
                        <div class="col-6" style="display:flex; justify-content:center;">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success"><span class="icon-arrow-with-circle-right btn_iconos"></span></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div> 
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
    </div>
@endsection