@extends('layouts.app')
@section('content')
    <h2>MIEMBROS DE MI GRUPO</h2>
    <!-- Mensaje de exito -->
    @if($message = Session::get('success'))
    <div class="alert alert-success mensaje w-100">
        <p>{{$message}}</p>
    </div>
    @endif 

  <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Tipo</th>
                            <th>Ciclo</th>
                            <th>Año</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($integrantes as $integrante) 
                            <tr>
                                <td>
                                    <img src="{{asset('img/'.$integrante->foto)}}" alt="" height="100">
                                </td>
                                <td>{{$integrante->nombre}}</td>
                                <td>{{$integrante->apellidos}}</td>
                                <td>{{$integrante->tipo}}</td>
                                <td>{{$integrante->ciclos->nombre}}</td>
                                <td>{{$integrante->cursos->anio}}</td>
                                <td>
                                    <form action="{{route('integrantes.destroy',$integrante->id)}}" method="post">
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
 
@endsection