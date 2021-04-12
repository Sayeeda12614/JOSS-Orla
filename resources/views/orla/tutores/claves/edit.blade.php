@extends('layouts.page')
@section('content')
<h1 style="margin:0 auto; text-align:center; color:white;">EDITAR LA CLAVE: {{$clave->clave}}</h1>
    <div class="container">
        <form action="{{route('claves.update',$clave->id)}}" method="post">
            @csrf
            @METHOD('PUT')
            <div class="row mt-5 bg-white w-50 p-2" style="display:flex; flex-direction:column; margin:0 auto; justify-content:center; align-items:center; border-radius:10px;">
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Clave</label>
                        <input type="text" name="clave" value="{{$clave->clave}}" class="form-control">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Ciclo Formativo</label>
                        <select name="ciclo" id="" class="form-control">
                        @if($clave->ciclo==null)
                            <option disabled value="">Seleccione Ciclo</option>
                        @endif
                        @foreach($ciclos as $ciclo)
                            @if($clave->ciclo!=null && $ciclo->id===$clave->ciclos->id)
                            <option selected value="{{$ciclo->id}}">{{$ciclo->nombre}}</option>
                        @else
                            <option value="{{$ciclo->id}}">{{$ciclo->nombre}}</option>
                        @endif
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Año</label>
                        <select name="ciclo" id="" class="form-control">
                        @if($clave->curso==null)
                            <option disabled value="">Seleccione Año</option>
                        @endif
                        @foreach($cursos as $curso)
                            @if($clave->curso!=null && $curso->id===$clave->cursos->id)
                            <option selected value="{{$curso->id}}">{{$curso->anio}}</option>
                        @else
                            <option value="{{$curso->id}}">{{$curso->anio}}</option>
                        @endif
                        @endforeach
                    </div>
                    <input type="hidden" name="tutor" value="{{Auth::user()->id}}">
                </div>
                <div class="col-12">
                    <div class="form-group" style="display:flex; justify-content:center;">
                        <button type="submit" class="btn btn-success">Guardar cambios</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection