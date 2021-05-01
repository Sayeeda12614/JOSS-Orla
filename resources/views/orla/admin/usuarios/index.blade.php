@extends('layouts.page')
@section('content')
    {{-- crear un nuevo curso --}}
    <div class="content-sm bg-white" style="width:80px; margin:10px;">
        <button class="bg-dark text-white"><a href="{{route('cursos.create')}}">Crear nuevo curso</a></button>
    </div>
    <div class="row row-cols-1 row-cols-md-4" style="padding: 18px; margin: 18px;">
        @foreach ($users as $usuario)          
            <div class="col mb-4">
                
                <div class="card text-white bg-dark">
                    <div class="card-body">
                      <h5 class="card-title">Usuario: {{$usuario['name']}}</h5>
                      <form action="{{route('usuarios.destroy', $usuario->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-danger">Borrar</button>
                      </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    

    
    {{-- <ul>
    @foreach ($cursos as $c)
        <li>{{$c['anio']}}</li>
    @endforeach
    </ul>
    {{$cursos}} --}}

    {{-- {{$ciclos}} --}}
@endsection