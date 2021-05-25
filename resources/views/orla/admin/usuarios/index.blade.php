@extends('layouts.page')
@section('content')

<div class="container mt-5">
    <h1>Listado Usuarios</h1>
     <div class="row">
        <div class="col">
            <table class="table mt-5 table-bordered table-hover">
                <thead class="thead-dark">
                <tr>
                    <th>Usuario</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($users as $usuario) 
                        <tr>
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
            <div class="row">
                <div class="col-12">
                    @if($users->count())
                        {{$users->links('pagination::bootstrap-4')}}
                    @endif  
                </div>
            </div>
        </div>
    </div>
</div>

    {{-- {{$users}} --}}
@endsection