@extends('layouts.page')
@section('content')
<h1>CLAVES DE REGISTRO</h1>
    @if($message = Session::get('success'))
        <div class="alert alert-success mensaje w-50" style="margin:0 auto;">
            <p style="text-align:center; margin:0 auto;">{{$message}}</p>
        </div>
    @endif 
    <div class="container mt-5">
        <div class="row ">
            <div class="col-12">
                <a href="{{route('claves_registro.create')}}" class="btn btn-success rounded-circle"><i class="fa fa-plus-circle btn_iconos" aria-hidden="true"></i></a>
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
  <style>
   td{color:white; font-size:1.2rem;text-align:center;}
    th{text-align:center;}
  </style>
@endsection