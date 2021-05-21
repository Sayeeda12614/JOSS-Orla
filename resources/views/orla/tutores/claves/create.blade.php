@extends('layouts.page')
@section('content')
  <div class="container mt-5">
  
    <div class="row fila">
        <h2>CREAR NUEVA CLAVE</h2>
        <div class="col-12 columna">
            <form action="{{route('claves.store')}}" method="post">
                @csrf
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Clave</label>
                            <input type="text" name="clave" class="form-control">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                        <label for="">Ciclo Formativo</label>
                        <select name="ciclo" id="" class="form-control">
                                <option value="#"disabled selected>Seleccione ciclo</option>
                                @foreach($ciclos as $ciclo)
                                    <option value="{{$ciclo->id}}">{{$ciclo->nombre}}</option>
                                @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                        <label for="">Curso Escolar</label>
                        <select name="curso" id="" class="form-control">
                                <option value="#" disabled selected>Seleccione año</option>
                                @foreach($cursos as $curso)
                                    <option value="{{$curso->id}}">{{$curso->anio}}</option>
                                @endforeach
                        </select>
                        </div>
                        <input type="hidden" name="tutor" value="{{Auth::user()->id}}">
                    </div>
                    <div class="col-12">
                        <div class="form-group" style="display:flex; justify-content:center;">
                            <button type="submit" class="btn btn-success rounded-circle"><i class="fa fa-plus-circle btn_iconos" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-12 columna">
            <a href="{{ route('claves.index')}}">
                <form action="{{ route('claves.index') }}" method="GET">
                    @csrf
                    <input type="hidden" name="tutor" value="{{Auth::user()->id}}">
                    <button type="submit" class="btn btn-warning m-1 rounded-circle"><i class="fa fa-chevron-left btn_iconos" aria-hidden="true"></i></button>
                </form>  
            </a>
        </div>
    </div>    
  </div> 

@endsection