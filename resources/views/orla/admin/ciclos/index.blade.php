@extends('layouts.page')
@section('content')

    <div class="container">
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
                <a class="btn btn-success rounded-circle" data-toggle="modal" data-target="#nuevoCiclo"><i class="fa fa-plus-circle btn_iconos" aria-hidden="true"></i></a>
            </div>
        </div>
        {{-- Tabla que muestra los ciclos --}}
        <div class="row">
            <div class="col">
                <table class="table mt-5 table-bordered table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Nombre Ciclo</th>
                        <th>Última modificación</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($ciclos as $ciclo)  
                            <tr>
                                <td>{{$ciclo->id}}</td>
                                <td>{{$ciclo['nombre']}}</td>
                                <td>{{$ciclo->updated_at}}</td>
                                <td>
                                    <form action="{{route('ciclos.destroy', $ciclo->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-primary" href="{{route('ciclos.edit', $ciclo->id)}}"><span class="icon-edit"></span></a>
                                        <button type="submit" class="btn btn-danger"><span class="icon-trash"></span></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach  
                    </tbody>  
                </table>
                <div class="row">
                    <div class="col-12">
                        @if($ciclos->count())
                            {{$ciclos->links('pagination::bootstrap-4')}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
   {{-- {{$ciclos}} --}}
  
   {{--  Modal crear ciclo --}}
   <div class="modal fade" id="nuevoCiclo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Crear ciclo</h3>
          </button>
        </div>
        <form action="{{route('ciclos.store')}}" method="post">
            {{-- @error('nombre')
                <div class="alert alert-danger">
                    El nombre es obligatorio
                </div>
                @enderror --}}

        <div class="modal-body">
                @csrf
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" name="nombre" class="form-control" required><br>
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
 
@endsection