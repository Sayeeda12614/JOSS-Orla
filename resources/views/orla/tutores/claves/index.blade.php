@extends('layouts.page')
@section('content')
<h1 style="margin:0 auto; text-align:center; color:white;">MIS CLAVES</h1>
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <table class="table mt-5">
                    <thead>
                        <tr style="background:wheat;">
                            <th>CLAVE</th>
                            <th>CICLO FORMATIVO</th>
                            <th>AÑO</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($claves as $clave)
                        <tr style="background:rgba(0, 0, 0, 0.28);">
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
  <style>
   td{color:white; font-size:1.2rem;text-align:center;}
    th{text-align:center;}
  </style>
@endsection