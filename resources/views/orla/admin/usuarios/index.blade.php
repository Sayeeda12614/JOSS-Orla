@extends('layouts.page')
@section('content')

<div class="container contentCiclo">
     <div class="row">
        <div class="col">
            <table class="table table-bordered table-hover table-light">
                <thead class="thead-dark">
                <tr>
                    <th>Usuario</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($users as $usuario) 
                        <tr class="table-info">
                            <td>{{$usuario['name']}}</td>
                            <td>
                                <form action="{{route('usuarios.destroy', $usuario->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
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

    {{-- {{$users}} --}}
@endsection