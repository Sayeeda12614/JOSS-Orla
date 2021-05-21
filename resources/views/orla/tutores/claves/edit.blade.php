@extends('layouts.page')
@section('content')
    <div class="container mt-5">
        <div class="row fila">
            <h2>EDITAR LA CLAVE: {{$clave->clave}}</h2>
            <div class="col-12 columna">
                <form action="{{route('claves.update',$clave->id)}}" method="post">
                @csrf
                @METHOD('PUT')
                <div class="row mt-5">
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
                                <button type="submit" class="btn btn-success m-1 rounded-circle"><i class="fa fa-floppy-o btn_iconos" aria-hidden="true"></i></button>
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