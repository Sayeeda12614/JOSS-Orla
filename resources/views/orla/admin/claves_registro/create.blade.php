@extends('layouts.page')
@section('content')
  <div class="container">
  <h1 style="color:white; margin:0 auto; text-align:center;">CREAR CLAVE</h1>
  <a href="{{ route('claves.index')}}">
        <form action="{{ route('claves.index') }}" method="GET">
            @csrf
            <input type="hidden" name="tutor" value="{{Auth::user()->id}}">
            <button type="submit" class="btn btn-primary m-1">Volver</button>
        </form>  
    </a>
  <form action="{{route('claves_registro.store')}}" method="post">
    @csrf
    <div class="row mt-5 bg-white w-50 p-2" style="display:flex; flex-direction:column; margin:0 auto; justify-content:center; align-items:center; border-radius:10px;">
        <div class="col-12">
            <div class="form-group">
                <label for="">Clave</label>
                <input type="text" name="clave" class="form-control">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
            <label for="">Curso Escolar</label>
            <select name="curso" id="" class="form-control">
                    <option value="#" disabled selected>Seleccione año</option>
                    @foreach($cursos as $curso)
                        <option value="{{$curso->id}}">{{$curso->anio}}</option>
                    @endforeach
            </select>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group" style="display:flex; justify-content:center;">
                <button type="submit" class="btn btn-success">CREAR</button>
            </div>
        </div>
    </div>
</form>
    
  </div> 
@endsection