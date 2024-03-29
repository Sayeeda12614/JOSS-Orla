@extends('layouts.page')
@section('content')

<div class="container">
    <h1>LISTADO DE CURSOS ESCOLARES</h1>
    <div class="row m-4">
        <div class="col-12">
            @if($message = Session::get('success'))
                <div class="alert alert-success msj_exito">
                    <p>{{$message}}</p>
                </div>
            @endif
            @if($message = Session::get('error'))
                <div class="alert alert-danger msj_error">
                    <p>{{$message}}</p>
                </div>
            @endif
        </div>
        <div class="col-12">
            <a class="btn btn-success rounded-circle" data-toggle="modal" data-target="#nuevoCurso"><i class="fa fa-plus-circle btn_iconos" aria-hidden="true"></i></a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table mt-5 table-bordered table-hover">
                <thead class="thead-dark">
                <tr>
                    <th>Nº</th>
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
            <div class="row">
                <div class="col">
                    @if($cursos->count())
                        {{$cursos->links('pagination::bootstrap-4')}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
{{--  Modal crear ciclo --}}
<div class="modal fade" id="nuevoCurso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Crear curso</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="{{route('cursos.store')}}" method="post">
    <div class="modal-body">
            @csrf
           <div class="form-group">
                <label for="">Año</label>
                <input type="number" name="anio" class="form-control" required><br>
           </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-window-close btn_iconos" aria-hidden="true"></i></button>
        <button type="submit" class="btn btn-success"><span class="icon-save btn_iconos"></span></button>
    </div>
</form>
    </div>
</div>
</div>
    {{-- {{$cursos}} --}}
@endsection