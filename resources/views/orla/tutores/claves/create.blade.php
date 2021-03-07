@extends('layouts.app')
@section('content')
   
<form action="{{route('claves.store')}}" method="post">
    @csrf
    <label for="">Clave</label>
    <input type="text" name="clave"><br>
    <label for="">Ciclo Formativo</label>
    <select name="ciclo" id="">
            <option value="#"disabled selected>Seleccione ciclo</option>
            @foreach($ciclos as $ciclo)
                <option value="{{$ciclo->id}}">{{$ciclo->nombre}}</option>
            @endforeach
    </select><br>
    <label for="">Curso Escolar</label>
    <select name="curso" id="">
            <option value="#" disabled selected>Seleccione año</option>
            @foreach($cursos as $curso)
                <option value="{{$curso->id}}">{{$curso->anio}}</option>
            @endforeach
    </select><br>
    <input type="hidden" name="tutor" value="{{Auth::user()->id}}"><br>
    <input type="submit" value="CREAR">
</form>
@endsection