<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Ticket</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            border: 0;
            box-sizing: border-box;
            text-decoration: none;
        }
        header {
            background-color: #5499C7;
            padding: 0.7rem 1rem;
            color: #ffffff
        }

        main {
            padding: 1rem;
            background-color: rgba(37, 138, 206, .2);
        }
        footer {
            background-color: #1C2833;
            padding:  1rem;
            color: #ffffff;
        }
        div {
            margin: 1rem 0rem;
            height: 4px;
            width: max-content;
            background-color: #ffffff
        }
    </style>
</head>

<body>

    <header>
        <h2>Macuin Dashboard | Tickets Por Auxiliar y Departamento</h2>
    </header>

    <main>
        @foreach ($consultaTickets as $ticket)
            <table class="table">
                <thead>
                    <tr>
                        <th style="color: #0e2b46; font-weight: 900; text-decoration: underline" scope="col">Auxiliar: 
                            {{ $ticket->auxiliar->datos->name }}
                            {{ $ticket->auxiliar->datos->apellido_p }}
                            {{ $ticket->auxiliar->datos->apellido_m }}</th>
                        <th scope="col">ID Auxiliar: {{ $ticket->auxiliar_id }}</th>
                        <th scope="col">ID Usuario: {{ $ticket->auxiliar->usuario_id }}</th>
                    </tr>
                </thead>
            </table>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Cliente: {{ $ticket->cliente->datos->name }}
                            {{ $ticket->cliente->datos->apellido_p }}
                            {{ $ticket->cliente->datos->apellido_m }}</th>
                        <th scope="col">ID Cliente: {{ $ticket->cliente_id }}</th>
                        <th scope="col">ID Usuario: {{ $ticket->cliente->usuario_id }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" colspan="2">Problematica:</th>
                        <th scope="row">Departamento:</th>
                    </tr>
                    <tr>
                        <td colspan="2">{{ $ticket->problema }} </td>
                        <td style="color: #0e2b46; font-weight: 900; text-decoration: underline">{{ $ticket->cliente->departamento->nombre }} </td>
                    </tr>

                    <tr>
                        <th scope="row" colspan="3">Detalles:</th>
                    </tr>
                    <tr>
                        <td>{{ $ticket->detalles }} </td>
                    </tr>

                    <tr>
                        <th scope="row" colspan="2">Estatus: {{ $ticket->estatus }}</th>
                        <th scope="row">Fecha: {{ $ticket->created_at }}</th>
                    </tr>
                </tbody>
            </table>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" colspan="3">Comentarios Administrador - Auxiliar:</th>
                    </tr>
                    @foreach ($ticket->comentarioAdminAux as $mensaje)
                        <tr>
                            <td>{{$mensaje->comentario}}</td>
                        </tr>
                    @endforeach
                </thead>
            </table>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" colspan="3">Comentarios Administrador - Cliente:</th>
                    </tr>
                    @foreach ($ticket->comentarioAdminCli as $mensaje)
                        <tr>
                            <td>{{$mensaje->comentario}}</td>
                        </tr>
                    @endforeach
                </thead>
            </table>
            <div>

            </div>
        @endforeach  
    </main>
    <footer>
        <h6>Macuin Dashboard | Reporte</h6>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>

</html>
