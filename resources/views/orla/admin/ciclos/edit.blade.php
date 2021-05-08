@extends('layouts.page')
@section('content')
    {{-- crear un nuevo curso --}}
    
    <div class="content bg-dark text-white" id="contentEditar">
        <form class="formEdit" action="{{route('ciclos.update', $ciclo->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="exampleInputPassword1">Editar Ciclo</label>
                <input type="text"  class="form-control" name="nombre" value="{{$ciclo->nombre}}">
            </div>
            <button type="submit" class="btn btn-primary">Modificar</button>
            <button class="btn btn-warning"><a href="{{route('ciclos.index')}}">Cancelar</a></button>
        </form>

    </div>

    {{-- {{$ciclos}} --}}
@endsection