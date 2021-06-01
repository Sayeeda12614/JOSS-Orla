@extends('layouts.page')
@section('content')
    <h2>EDITANDO {{$integrante->nombre}} {{$integrante->apellidos}}</h2>
    <div class="container">
        <form action="{{route('integrantes.update', $integrante->id)}}" method="post">
            @csrf
            @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" name="nombre" value="{{$integrante->nombre}}" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Apelidos</label>
                                <input type="text" name="apellidos" value="{{$integrante->apellidos}}" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <img src="{{asset('img/'.$integrante->foto)}}" alt="" height="150"><br>
                                <input type="file" value="{{$integrante->foto}}" accept="image/png, .jpeg, .jpg" name="foto"><br>
                                {{$integrante->foto}}
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Tipo</label>
                                <select name="tipo" id="" required>
                                     @if($integrante->tipo=="")
                                        <option disabled value="">Selecciona tipo</option>
                                        <option value="alumno">Alumno</option>
                                        <option value="profesor">Profesor</option>
                                        @else
                                        <option value="{{$integrante->tipo}}" selected>{{$integrante->tipo}}</option>
                                            @if($integrante->tipo=='alumno')
                                            <option value="profesor">Profesor</option>
                                            @elseif($integrante->tipo=='profesor')
                                            <option value="alumno">Alumno</option>
                                            @endif
                                     @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="hidden" name="tutor" value="{{$integrante->tutor}}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Ciclo Formativo</label>
                                <select name="ciclo" id="">
                                    <option value="{{$integrante->ciclos->id}}" selected>{{$integrante->ciclos->nombre}}</option>
                                    @foreach($ciclos as $ciclo)
                                        <option value="{{$ciclo->id}}">{{$ciclo->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Curso</label>
                                <select name="curso" id="">
                                    <option value="{{$integrante->cursos->id}}" selected>{{$integrante->cursos->anio}}</option>
                                    @foreach($cursos as $curso)
                                        <option value="{{$curso->id}}">{{$curso->anio}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-warning m-1">Volver</button>
                        <button type="submit" class="btn btn-success m-1">Guardar cambios</button>
                    </div> 
        </form>
    </div>
@endsection