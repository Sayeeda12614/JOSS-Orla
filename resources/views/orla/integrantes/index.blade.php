@extends('layouts.page')
@section('content')

    <!-- Mensaje de exito -->
    @if($message = Session::get('success'))
    <div class="alert alert-success msj_exito">
        <p>{{$message}}</p>
    </div>
    @endif 

  <div class="container mt-5">
      <h1 class="">MIEMBROS DE MI GRUPO</h1>
        <div class="row mt-2">
            <div class="col-12 scrollable">
                <table class="table  mt-5 table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>FOTO</th>
                            <th>NOMBRE</th>
                            <th>APELLIDOS</th>
                            <th>TIPO</th>
                            <th>CICLO FORMATIVO</th>
                            <th>AÑO</th>
                            <th>ACIÓN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($integrantes as $integrante) 
                            <tr>
                                <td>
                                    <img style="border-radius:50%;" src="./assets/Fotos_integrantes/{{$integrante->foto}}" alt="" height="60">
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