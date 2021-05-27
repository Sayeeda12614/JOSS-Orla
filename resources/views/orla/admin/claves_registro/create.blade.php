@extends('layouts.page')
@section('content')
<div class="container mt-5 mb-5">
    <div class="row fila">
        <h2>CREAR CLAVE</h2>
        <div class="col-12 columna">
            <form action="{{route('claves_registro.store')}}" method="post">
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
                            <label for="">Curso Escolar</label>
                            <select name="curso" id="" class="form-control">
                                    <option value="#" disabled selected>Seleccione año</option>
                                    @foreach($cursos as $curso)
                                        <option value="{{$curso->id}}">{{$curso->anio}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group" style="display:flex; justify-content:center;">
                            <button type="submit" class="btn btn-success"><span class="icon-save btn_iconos"></span></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-12 columna">
            <a href="{{ route('claves_registro.index')}}">
            <button type="submit" class="btn btn-secondary m-1"><span class="icon-arrow-with-circle-left btn_iconos"></span></button> 
            </a>
        </div> 
    </div>  
</div> 
@endsection