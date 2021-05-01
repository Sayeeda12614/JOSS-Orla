@extends('layouts.page')
@section('content')
    <div class="container">
    <marquee behavior="" direction=""><h1 style="text-align:center; margin:0 auto; margin-top:5%; color:white;" >CONTROL DE ACCESO PARA ENVIAR DATOS</h1></marquee>
    
        <div class="row mt-5 w-50" style="display:flex; justify-content:center; background:wheat; margin:0 auto; padding:10px; border-radius:15px;">
            
            <div class="col-12">
                <form action="{{route('control.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Introduzca la clave de tu tutor/a</label><br>
                        <input type="text" name="codigo" class="form-control" placeholder="Clave"><br>
                        <input type="submit" class="btn btn-success" value="ENTRAR">
                    </div>
                </form>
                <p style="text-align:center; color:red; font-size:1.5rem;">Sólo para profesores/as y alumn@s del centro</p>
            </div> 
            @if($message = Session::get('success'))
                <div class="alert alert-success mensaje w-50" style="margin:0 auto;">
                    <p style="text-align:center; margin:0 auto;">{{$message}}</p>
                </div>
            @endif 
            @if($message = Session::get('error'))
                <div class="alert alert-danger" style="margin:0 auto;">
                    <p style="text-align:center; margin:0 auto;">{{$message}}</p>
                </div>
            @endif    
        </div>
        <div class="row mt-5 w-50" style="display:flex; justify-content:center; align-items:center; margin:0 auto; ">
            <div class="col-12">
                <div class="form-group">
                    <a href="{{route('inicio')}}" class="btn btn-warning">VOLVER</a>
                </div>
            </div>   
        </div>
    </div>
@endsection