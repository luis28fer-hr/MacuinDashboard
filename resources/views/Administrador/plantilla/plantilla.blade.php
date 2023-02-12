<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MD |  @yield('titulo', 'Inicio')</title>
    <link href="{{ URL::asset('css/navbar.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('css/dashboard.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('css/modal.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://kit.fontawesome.com/67609a736e.css" crossorigin="anonymous">

</head>

<body>

    @include('Administrador/plantilla/navegacion')

    @yield('contenido_Administrador')


    <script src="https://kit.fontawesome.com/67609a736e.js" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('js/modal.js') }}"></script>
</body>

</html>
