@extends('layouts.page')
@section('content')
    {{-- crear un nuevo curso --}}
    
    <div class="content bg-dark text-white" id="contentEditar">
        <form class="formEdit" action="{{route('ciclos.update', $ciclo->id)}}" method="POST">
            @csrf
            @method('PUT')
            
            @error('nombre')
                <div class="alert alert-danger">
                    El nombre es obligatorio
                </div>
            @enderror

            <div class="form-group">
                <label for="exampleInputPassword1">Editar Ciclo</label>
                <input type="text"  class="form-control" name="nombre" value="{{$ciclo->nombre}}">
            </div>
            <button type="submit" class="btn btn-primary">Modificar</button>
            <a class="btn btn-warning" href="{{route('ciclos.index')}}">Cancelar</a>
        </form>

    </div>

    {{-- {{$ciclos}} --}}
@endsection