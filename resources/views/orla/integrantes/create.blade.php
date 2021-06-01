@extends('layouts.page')
@section('content')

    <div class="container mt-5">   
        <div class="row fila">
            <h2>DATOS PARA LA ORLA</h2>
            <div class="col-12 columna">
                <form action="{{ route('integrantes.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" placeholder="Nombre" name="nombre" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" placeholder="Apellidos" name="apellidos" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="file" placeholder="Foto" name="foto" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <select name="tipo" id="" class="form-control" required>
                                    <option value="" selected disabled>Seleccione tipo</option>
                                    <option value="alumno">Alumno</option>
                                    <option value="profesor">Profesor</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            @foreach($clave as $c)
                                <input type="hidden" name="tutor" value="{{$c->tutor}}">
                                <input type="hidden" name="ciclo" value="{{$c->ciclo}}">
                                <input type="hidden" name="curso" value="{{$c->curso}}">
                            @endforeach
                            <!--  -->
                        </div>
                        <div class="col-12">
                            <div class="form-group" style="display: flex; justify-content:space-around">
                                <a href="{{route('inicio')}}" class="btn btn-secondary m-1"><span class="icon-arrow-with-circle-left btn_iconos"></span></a>
                                <button type="submit" class="btn btn-success m-1"><span class="icon-arrow-with-circle-right btn_iconos"></span></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
   
@endsection