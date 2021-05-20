@extends('layouts.page')
@section('content')
<h1 style="margin:0 auto; text-align:center; color:white;">EDITAR LA CLAVE REGISTRO: {{$clave->clave}}</h1>
    <div class="container">
        <form action="{{route('claves_registro.update',$clave->id)}}" method="post">
            @csrf
            @METHOD('PUT')
            <div class="row mt-5 bg-white w-50 p-2" style="display:flex; flex-direction:column; margin:0 auto; justify-content:center; align-items:center; border-radius:10px;">
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Clave</label>
                        <input type="text" name="clave" value="{{$clave->clave}}" class="form-control">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Año</label>
                        <select name="ciclo" id="" class="form-control">
                        @if($clave->curso==null)
                            <option disabled value="">Seleccione Año</option>
                        @endif
                        @foreach($cursos as $curso)
                            @if($clave->curso!=null && $curso->id===$clave->cursos->id)
                            <option selected value="{{$curso->id}}">{{$curso->anio}}</option>
                        @else
                            <option value="{{$curso->id}}">{{$curso->anio}}</option>
                        @endif
                        @endforeach
                    </div>
                    
                </div>
                <div class="col-12">
                    <div class="form-group" style="display:flex; justify-content:center;">
                        <button type="submit" class="btn btn-success m-1">Guardar cambios</button>
                    </div>
                </div>
            </div>
        </form>
        <a href="{{ route('claves_registro.index')}}" class="btn btn-primary m-1"> Volver</a>
    </div>
    
@endsection