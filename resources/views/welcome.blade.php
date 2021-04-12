@extends('layouts.page')
@yield('content')

    <div class="container">
        <div id="app">
            <orla-component></orla-component>
            
        </div>
    </div>  
<script src="{{asset("js/orla.js")}}" defer></script>
@endyield
