@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table mt-5">
                    <thead>
                        <tr>
                            <th>Clave</th>
                            <th>Ciclo Formativo</th>
                            <th>Curso</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($claves as $clave)
                        <tr class="list-group-item-action">
                            <td>{{$clave->clave}}</td>
                            <td>{{$clave->ciclos->nombre}}</td>
                            <td>{{$clave->cursos->anio}}</td>
                            <td>
                                <form action="{{route('claves.destroy',$clave->id)}}" method="post">
                                    @csrf
                                    @METHOD('DELETE')
                                    <a href="{{route('claves.edit',$clave->id)}}" class="btn btn-warning"><span class="icon-edit"></span></a>
                                    <button type="submit" class="btn btn-danger"><span class="icon-trash"></span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a href="{{route('claves.create')}}" class="btn btn-success">Crear clave</a>
            </div>
        </div>
    </div>
  
@endsection