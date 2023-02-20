@extends('Administrador/plantilla/plantilla')

@section('titulo', 'Dashboard')

@section('contenido_Administrador')


@if (session()->has('activa_sesion'))
{!!"<script> Swal.fire({
    icon: 'success',
    title: '¡Bienvenido!',
    text: 'Administrador!',
    })</script> "!!}
@endif

@if (session()->has('perfil_actualizado'))
{!!"<script> Swal.fire({
    icon: 'success',
    title: '¡Tus datos se han actualizado!',
    text: 'Administrador',
    })</script> "!!}
@endif


<main>
    <h1>Dashboard</h1>
    <hr>
    <div class="grid-container">
        <div class="grid-item">
            <i class="fa-solid fa-user-tie"></i>
            Auxiliares
            <span>Cantidad: {{$contAux}}</span>
        </div>
        <div class="grid-item">
            <i class="fa-solid fa-users"></i>
            Clientes
            <span>Cantidad: {{$contCli}}</span>
        </div>
        <div class="grid-item">
            <i class="fa-solid fa-building"></i>
            Departamentos
            <span>Cantidad: {{$contDep}}</span>
        </div>
        <div class="grid-item">
            <i class="fa-solid fa-ticket"></i>
            Tickets
            <span>Cantidad: </span>
        </div>
    </div>

    <div class="calendar-grid">
        <div class="grid-item-calendar">
            <iframe
                src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23039BE5&ctz=America%2FMexico_City&showTitle=1&showNav=0&showPrint=0&showTabs=1&showCalendars=0&title=Macuin%20Dashboard&showDate=1&showTz=1&src=M2ZkNTk1ZTg0OGJiNzIyYzYwMWZkZDU3NTQ0NjYxZmUxNDkyMmY0ZmI0YjM1NzAwOGI1M2M3MTMwZTkzMzVkZUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=ZXMubWV4aWNhbiNob2xpZGF5QGdyb3VwLnYuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&color=%23AD1457&color=%230B8043"
                width="500" height="400" frameborder="0" scrolling="no"></iframe>
        </div>
        <div class="grid-item">
            <span>Notificaciones</span>
            Tickets
            <ul>
                <li>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, voluptatem.
                </li>
            </ul>
            <ul>
                <li>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </li>
            </ul>
            <ul>
                <li>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </li>
            </ul>
            <ul>
                <li>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </li>
            </ul>
            <ul>
                <li>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </li>
            </ul>
            <ul>
                <li>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </li>
            </ul>

        </div>
    </div>

</main>

@endsection

