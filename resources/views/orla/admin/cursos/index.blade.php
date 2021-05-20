@extends('layouts.page')
@section('content')

<div class="container contentCiclo">
    {{-- crear un nuevo curso --}}
    <div class="row m-4">
        <div class="col">
            <a class="btn btn-success" data-toggle="modal" data-target="#nuevoCurso">Nuevo Curso</a>
            {{-- <a class="btn btn-success" href="{{route('ciclos.create')}}">Nuevo ciclo</a> --}}
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-bordered table-hover table-light">
                <thead class="thead-dark">
                <tr>
                    <th>Curso</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($cursos as $curso)  
                        <tr class="table-info">
                            <td>Año: {{$curso['anio']}}</td>
                            <td>
                                <form action="{{route('cursos.destroy', $curso->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary" href="{{route('cursos.edit', $curso->id)}}">Editar</a>
                                    <input class="btn bg-danger" type="submit" value="Borrar">
                                </form>
                            </td>
                        </tr>
                    @endforeach  
                </tbody>  
            </table>
        </div>
    </div>
</div>
{{--  Modal crear ciclo --}}
<div class="modal fade" id="nuevoCurso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear curso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="{{route('cursos.store')}}" method="post">
    <div class="modal-body">
            @csrf
            <label for="">Año</label>
            <input type="text" name="anio"><br>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <input class="btn btn-success" type="submit" value="AGREGAR">
    </div>
</form>
    </div>
</div>
</div>
    {{-- {{$cursos}} --}}
@endsection