<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Macuin Dashboard</title>
    <link href="{{ URL::asset('css/login.css') }}" rel="stylesheet" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    @if (session()->has('error_sesion'))
    {!!"<script> Swal.fire({
        icon: 'error',
        title: 'Usuario no encontrado',
        text: 'Revise sus credenciales!',
        })</script> "!!}
    @endif

    <div class="fondo"></div>
    <div class="contenedor">
        <div class="izquierda">
            <img src="{!! asset('img/logo.png') !!}" alt="Macuin Dashboard">
        </div>
        <div class="derecha">
            <h1>Inicio de Sesión</h1>
            <form action="{{route('validar')}}" method="POST">
                @csrf
                <div>
                    <p>Correo:</p>
                    <input type="text" name="email" value="{{old('email')}}">
                    <span> {{$errors->first('email')}}</span>
                </div>
                <div>
                    <p>Contraseña:</p>
                    <input type="password" name="password">
                    <span>{{$errors->first('password')}}</span>
                </div>
                <button type="submit">Ingresar</button>
            </form>
        </div>
    </div>
</body>
</html>
