@extends('layouts.page')
@section('content')

    <div class="container">
        <h1 style="margin:0 auto; text-align:center; color:white;">DATOS PARA LA ORLA</h1>
        <form action="{{ route('integrantes.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mt-5 p-5" style="display:flex; flex-direction:column; justify-content:center; align-items:center; margin:0 auto; width:50%; background:white; border-radius:5px;">
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
                    <button type="submit" class="btn btn-success m-1">Enviar</button>
                    <a href="{{route('inicio')}}" class="btn btn-info m-1">Volver</a>
                </div>
            </div>
        </form>
    </div>
   
@endsection