<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OrlaTxu</title>
    {{-- estilos --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plantilla.css') }}" rel="stylesheet">
    <link rel="icon" type="image/vnd.microsoft.icon" href="imagenes/logos/logo_favicon.png">
</head>

<body>
    {{-- menu --}}
@include('plantilla-partes.menu')
    {{-- contenido de prueba --}}
        <div class="card-group">
        <div class="card">
          <img src="imagenes/logos/logo_favicon.png" height="280px" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
        <div class="card">
          <img src="imagenes/logos/fondo.jpg"  alt="..." height="280px">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
        <div class="card">
          <img src="imagenes/logos/logo_favicon.png" height="280px" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>         
      </div>
      {{-- fin del contenido de prueba --}}

      @yield('content')
</body>
@include('plantilla-partes.footer')


{{-- script --}}
 <script src="{{ asset('js/app.js') }}"></script>
</html>