@extends('layouts.page')
@section('content')
{{-- crear un nuevo curso --}}
<div class="content-sm bg-white" style="width:80px; margin:10px;">
    <button class="bg-dark text-white"><a href="{{route('ciclos.create')}}">Crear nuevo curso</a></button>
</div>

<div class="row row-cols-1 row-cols-md-4" style="padding: 18px; margin: 18px;">
   @foreach ($ciclos as $ciclo)          
       <div class="col mb-4">
           <div class="card text-white bg-dark">
               <div class="card-body">
                 <h5 class="card-title">Ciclo: {{$ciclo['nombre']}}</h5>
                 <button class="bg-success">Editar</button>
                 <button class="bg-danger">Borrar</button>
               </div>
           </div>
       </div>
   @endforeach
</div>
   {{-- {{$ciclos}} --}}
@endsection