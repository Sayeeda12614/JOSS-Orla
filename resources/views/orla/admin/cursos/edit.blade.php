@extends('layouts.page')
@section('content')
    {{-- crear un nuevo curso --}}
    
    <div class="content">
        <form action="{{route('cursos.update', $curso->id)}}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="anio" value="{{$curso->anio}}">
            <button type="submit">Enviar</button>
        </form>

    </div>


    

    
    {{$curso}}

    {{-- {{$ciclos}} --}}
@endsection