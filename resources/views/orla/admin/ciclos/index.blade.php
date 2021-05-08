@extends('layouts.page')
@section('content')

    <div class="container contentCiclo">
        <div class="row m-4">
            <div class="col">
                {{-- crear un nuevo curso --}}
                <a class="btn btn-success" href="{{route('ciclos.create')}}">Nuevo ciclo</a>
            </div>
        </div>

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
@endsection