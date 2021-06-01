@extends('layouts.page')
@section('content')
    <form action="{{route('cursos.store')}}" method="post">
        @csrf
        <label for="">Año</label>
        <input type="text" name="anio" required>
        <input type="submit" value="AGREGAR">
    </form>
@endsection
