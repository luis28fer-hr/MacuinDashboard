@extends('Cliente/plantilla/plantilla')

@section('titulo', 'Tickets')

@section('contenido_cliente')


    @if (session()->has('activa_sesion'))
        {!! "<script> Swal.fire({
            title: '¡Bienvenido!',
            text: 'Cliente!',
            icon: 'success',
        })</script> " !!}
    @endif

    @if (session()->has('perfil_actualizado'))
        {!! "<script> Swal.fire({
            icon: 'success',
            title: 'Perfil Actualizado!',
            text: 'Cliente!',
            })</script> " !!}
    @endif

    <main>

        <h1>Tickets</h1>
        <div class="tickets-options">
            <div class="filtros">
                <a class="btn-newTicket">Solicitar<i class="fa-solid fa-ticket"></i></a>
            </div>
        </div>

        <hr>
        <section class="tickets">

            <div class="tickets-container">



            </div>
        </section>

    </main>

@endsection
