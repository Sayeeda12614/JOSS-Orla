@extends('layouts.page')
@section('content')
  <div class="container">
  <h1 style="color:white; margin:0 auto; text-align:center;">CREAR CLAVE</h1>
  <form action="{{route('claves.store')}}" method="post">
    @csrf
    <div class="row mt-5 p-5" style="display:flex; flex-direction:column; justify-content:center; align-items:center; margin:0 auto; width:50%; background:white; border-radius:5px">
        <div class="col-12">
            <div class="form-group">
                <label for="">Clave</label>
                <input type="text" name="clave" class="form-control">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
            <label for="">Ciclo Formativo</label>
            <select name="ciclo" id="" class="form-control">
                    <option value="#"disabled selected>Seleccione ciclo</option>
                    @foreach($ciclos as $ciclo)
                        <option value="{{$ciclo->id}}">{{$ciclo->nombre}}</option>
                    @endforeach
            </select>
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
            <input type="hidden" name="tutor" value="{{Auth::user()->id}}">
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