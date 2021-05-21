@extends('layouts.page')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            @if($message = Session::get('success'))
            <div class="alert alert-success msj_exito">
                <p>{{$message}}</p>
            </div>
            @endif
        </div>
    </div>
</div>


 
@endsection
