@extends('layouts.page')
@section('content')
    {{-- crear un nuevo curso --}}
    
    <div class="content bg-dark text-white contentEditar">
        <form class="formEdit" action="{{route('cursos.update', $curso->id)}}" method="POST">
            @csrf
            @method('PUT')

            @error('nombre')
                <div class="alert alert-danger">
                    El nombre es obligatorio
                </div>
            @enderror
            <div class="form-group">
                <label for="exampleInputPassword1">Editar Curso</label>
                <input type="text" name="anio" value="{{$curso->anio}}">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
            <a class="btn btn-warning" href="{{route('cursos.index')}}">Cancelar</a>
        </form>

    </div>


    

    
    {{$curso}}

    {{-- {{$ciclos}} --}}
@endsection