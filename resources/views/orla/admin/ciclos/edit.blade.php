@extends('layouts.page')
@section('content')
    {{-- crear un nuevo curso --}}
    
    <div class="container mt-5">
        <div class="row fila">
            <h2>EDITAR: {{$ciclo->nombre}}</h2>
            <div class="col-12 columna">
                <form class="formEdit" action="{{route('ciclos.update', $ciclo->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    @error('nombre')
                        <div class="alert alert-danger">
                            El nombre es obligatorio
                        </div>
                    @enderror
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nombre</label>
                                <input type="text"  class="form-control" name="nombre" value="{{$ciclo->nombre}}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group" style="display: flex; justify-content:space-around">
                                <a class="btn btn-secondary" href="{{route('ciclos.index')}}"><span class="icon-arrow-with-circle-left btn_iconos"></span></a>
                                <button type="submit" class="btn btn-success"><span class="icon-save btn_iconos"></span></button>
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>

    {{-- {{$ciclos}} --}}
@endsection