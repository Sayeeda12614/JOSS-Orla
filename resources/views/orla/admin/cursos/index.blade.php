@extends('layouts.page')
@section('content')

<div class="container">
    <div class="row m-4">
        <div class="col">
            {{-- crear un nuevo curso --}}
            <a class="btn btn-success" href="{{route('cursos.create')}}">Nuevo curso</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table mt-5 table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th>Curso</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($cursos as $curso)  
                        <tr>
                            <td>Año: {{$curso['anio']}}</td>
                            <td>
                                <form action="{{route('cursos.destroy', $curso->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary" href="{{route('cursos.edit', $curso->id)}}">Editar</a>
                                    <input class="btn btn-danger" type="submit" value="Borrar">
                                </form>
                            </td>
                        </tr>
                    @endforeach  
                </tbody>  
            </table>
        </div>
    </div>
</div>

    {{-- {{$cursos}} --}}
@endsection