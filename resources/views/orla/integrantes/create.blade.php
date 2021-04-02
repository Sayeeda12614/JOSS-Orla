@extends('layouts.page')
@section('content')

    <div class="container">
        <h2>DATOS PARA LA ORLA</h2>
        <form action="{{ route('integrantes.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <input type="text" placeholder="Nombre" name="nombre" class="form-control">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <input type="text" placeholder="Apellidos" name="apellidos" class="form-control">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <input type="file" placeholder="Foto" name="foto" class="form-control">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <select name="tipo" id="" class="form-control">
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
                    <button type="submit" class="btn btn-success m-5">Enviar</button>
                    <a href="#" class="btn btn-info m-5">Volver</a>
                </div>
            </div>
        </form>
    </div>
   
@endsection