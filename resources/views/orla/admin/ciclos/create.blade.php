@extends('layouts.page')
{{-- contenido de crear un ciclo --}}
@section('content')
    <form action="{{route('ciclos.store')}}" method="post">
        @csrf
        <label for="">Nombre</label>
        <input type="text" name="nombre"><br>
        <input type="submit" value="AGREGAR">
    </form>
@endsection