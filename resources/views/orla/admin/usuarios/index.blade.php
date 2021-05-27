@extends('layouts.page')
@section('content')

<div class="container mt-5">
    <h1>Listado Usuarios</h1>
     <div class="row">
        <div class="col">
            <table class="table mt-5 table-bordered table-hover">
                <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Tipo</th>
                    <th>Email</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($users as $usuario) 
                        <tr>
                            <td>{{$usuario['name']}}</td>
                            <td>{{$usuario->apellidos}}</td>
                            <td>{{$usuario->tipo}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>
                                <form action="{{route('usuarios.destroy', $usuario->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><span class="icon-trash"></span></button>
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