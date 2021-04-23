@extends('layouts.page')
@section('content')
    {{-- crear un nuevo curso --}}
    
    <div class="content">
        <form action="{{route('ciclos.update', $ciclo->id)}}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="nombre" value="{{$ciclo->nombre}}">
            <button type="submit">Enviar</button>
        </form>

    </div>


    

    
    {{$curso}}

    {{-- {{$ciclos}} --}}
@endsection