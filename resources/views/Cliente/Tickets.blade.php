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

    @if (session()->has('ticket_agregado'))
    {!! "<script> Swal.fire({
        icon: 'success',
        title: 'Ticket Agregado!',
        text: 'Cliente!',
        })</script> " !!}
@endif
    <main>

        <h1>Tickets</h1>
        <div class="tickets-options">
            <div class="filtros">
                <a onclick="agregarTicket()" class="btn-newTicket">Solicitar<i class="fa-solid fa-ticket"></i></a>
            </div>
            @include('Cliente/Modales/NuevoTicket')
        </div>

        <hr>
        <section class="tickets">

            <div class="tickets-container">

                <div class="tickets-card">
                    <div class="tickets-detalles">
                        <div class="general">
                            <p>ID: </p>
                            <div>
                                <p>Auxiliar:</p>
                                <p>Lorem ipsum dolor sit amet.</p>
                            </div>
                            <div>
                                <p>Estatus:</p>
                                <p>En proceso</p>
                            </div>
                            <p>Fecha: </p>
                        </div>
                        <div class="detallado">
                            <p> {{Auth::user()->name}} {{Auth::user()->apellido_p}} {{Auth::user()->apellido_m}}</p>
                            <p>Departamento: </p>

                            <p>Problematica: </p>
                            <p>Detalles: </p>
                        </div>
                    </div>
                    <div class="tickets-btns-aux">

                        <div class="btns-aux">
                            <a onclick="verMensajesAdmin()" title="Ver comentarios del Administrador" class="btn"><i class="fa-solid fa-user-tie"></i></a>
                            <a onclick="verMensajesAdmin()" title="Ver comentarios del Administrador" class="btn"><i class="fa-regular fa-message"></i></a>
                        </div>

                        <div class="btns-cli">
                            <a onclick="verMensajesAux()" title="Ver comentarios del Auxiliar" class="btn"><i class="fa-solid fa-users"></i></a>
                            <a onclick="verMensajesAux()" title="Ver comentarios del Auxiliar" class="btn"><i class="fa-regular fa-message"></i></a>

                        </div>

                        <div class="btns-repo">
                            <a onclick="cancelTicket()" class="btn" title="Cancelar Ticket"><i class="fa-solid fa-ban"></i></a>
                        </div>
                    </div>
                </div>
                @include('Cliente/Modales/Cancelar')
                @include('Cliente/Modales/MensajeAdmin')
                @include('Cliente/Modales/MensajeCliente')

            </div>
        </section>

    </main>

@endsection
