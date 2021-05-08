@extends('layouts.page')
@section('content')

    <div class="container contentCiclo">
        {{-- Si se visualiza index después de hacer una modificiación 
        muestra un mensaje --}}
        @if (session('mensaje'))
        <div class="alert alert-success fade show">
            {{ session('mensaje') }}
        </div>
        @endif

        {{-- crear un nuevo curso --}}
        <div class="row m-4">
            <div class="col">
                <a class="btn btn-success" data-toggle="modal" data-target="#nuevoCiclo">Nuevo ciclo</a>
                {{-- <a class="btn btn-success" href="{{route('ciclos.create')}}">Nuevo ciclo</a> --}}
            </div>
        </div>
        {{-- Tabla que muestra los ciclos --}}
        <div class="row">
            <div class="col">
                <table class="table table-bordered table-hover table-light">
                    <thead class="thead-dark">
                    <tr>
                        <th>Nombre Ciclo</th>
                        <th>Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($ciclos as $ciclo)  
                            <tr class="table-info">
                                <td>{{$ciclo['nombre']}}</td>
                                <td>
                                    <form action="{{route('ciclos.destroy', $ciclo->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-primary" href="{{route('ciclos.edit', $ciclo->id)}}">Editar</a>
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
   {{-- {{$ciclos}} --}}
  
   {{--  Modal crear ciclo --}}
   <div class="modal fade" id="nuevoCiclo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear ciclo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('ciclos.store')}}" method="post">
        <div class="modal-body">
                @csrf
                <label for="">Nombre</label>
                <input type="text" name="nombre"><br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <input class="btn btn-success" type="submit" value="AGREGAR">
        </div>
    </form>
      </div>
    </div>
  </div>
@endsection