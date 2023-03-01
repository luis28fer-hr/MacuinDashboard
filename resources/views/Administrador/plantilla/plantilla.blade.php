<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MD |  @yield('titulo', 'Inicio')</title>
    <link href="{{ URL::asset('css/navbar.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('css/dashboard.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('css/auxiliares.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('css/departamento.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('css/clientes.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('css/modal.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://kit.fontawesome.com/67609a736e.css" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body>

    @include('Administrador/plantilla/navegacion')

    @yield('contenido_Administrador')


    <script src="https://kit.fontawesome.com/67609a736e.js" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('js/modal.js') }}"></script>
    <script src="{{ URL::asset('js/modalDepartamento.js') }}"></script>
    <script src="{{ URL::asset('js/modalAuxiliar.js') }}"></script>
    <script src="{{ URL::asset('js/modalCliente.js') }}"></script>

</body>

</html>
