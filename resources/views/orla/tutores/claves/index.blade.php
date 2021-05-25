@extends('layouts.page')
@section('content')
    <div class="container mt-5">
    <h1>MIS CLAVES</h1>
        <div class="row">
            <div class="col-12">
                <a href="{{route('claves.create')}}" class="btn btn-success rounded-circle"><i class="fa fa-plus-circle btn_iconos" aria-hidden="true"></i></a>
                <table class="table mt-5 table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>CLAVE</th>
                            <th>CICLO FORMATIVO</th>
                            <th>AÑO</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($claves as $clave)
                        <tr>
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
            </div>
        </div>
    </div>
  
@endsection