<!doctype html>
<html lang="es" style="height: 100%">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link class="logo" rel="icon" type="image/vnd.microsoft.icon" href="..\image/logo.png"> -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>OrlaTxu</title>

    @include("plantilla-partes.include")

    @yield("head-extras")

</head>
<body>
    <header>

    </header>
    <nav>
        @include("plantilla-partes.menu")
    </nav>
    <main style="width:100%; height: 100%;">
        @yield("content")
    </main>
    <!-- <footer>
        @include("plantilla-partes.footer")
    </footer> -->

    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
