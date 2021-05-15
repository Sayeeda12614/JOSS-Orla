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
        <div class="col-12">
            <table class="table mt-5 table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Año</th>
                    <th>Última modificación</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($cursos as $curso)  
                        <tr>
                            <td>{{$curso->id}}</td>
                            <td>{{$curso['anio']}}</td>
                            <td>{{$curso->updated_at}}</td>
                            <td>
                                <form action="{{route('cursos.destroy', $curso->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary" href="{{route('cursos.edit', $curso->id)}}"><span class="icon-edit"></span></a>
                                    <button type="submit" class="btn btn-danger"><span class="icon-trash"></span></button>
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