@extends('layouts.page')
@section('content')
<h1 style="margin:0 auto; text-align:center; color:white;">CLAVES DE REGISTRO</h1>
    @if($message = Session::get('success'))
        <div class="alert alert-success mensaje w-50" style="margin:0 auto;">
            <p style="text-align:center; margin:0 auto;">{{$message}}</p>
        </div>
    @endif 
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <table class="table mt-5 table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>CLAVE</th>
                            <th>AÑO</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($claves_registro as $clave)
                        <tr>
                            <td>{{$clave->id}}</td>
                            <td>{{$clave->clave}}</td>
                            <td>{{$clave->cursos->anio}}</td>
                            <td>
                                <form action="{{route('claves_registro.destroy',$clave->id)}}" method="post">
                                    @csrf
                                    @METHOD('DELETE')
                                    <a href="{{route('claves_registro.edit',$clave->id)}}" class="btn btn-warning"><span class="icon-edit"></span></a>
                                    <button type="submit" class="btn btn-danger"><span class="icon-trash"></span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a href="{{route('claves_registro.create')}}" class="btn btn-success">Crear clave</a>
            </div>
        </div>
    </div>
  <style>
   td{color:white; font-size:1.2rem;text-align:center;}
    th{text-align:center;}
  </style>
@endsection