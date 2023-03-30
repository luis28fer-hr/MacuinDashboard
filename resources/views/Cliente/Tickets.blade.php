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
                <a onclick="agregarTicket()" class="btn-newTicket">Solicitar<i class="fa-solid fa-ticket"></i></a>
            </div>
            @include('Cliente/Modales/NuevoTicket')
        </div>

        <hr>
        <section class="tickets">

            <div class="tickets-container">
                @foreach ($consultaTickets as $ticket)
                    <div class="tickets-card">
                        <div class="tickets-detalles">
                            <div class="general">
                                <p>ID: {{ $ticket->id_ticket }}</p>
                                <div>
                                    <p>Auxiliar:</p>
                                    <p>{{ $ticket->auxiliar->datos->name }} {{ $ticket->auxiliar->datos->apellido_p }}
                                        {{ $ticket->auxiliar->datos->apellido_m }}</p>
                                </div>
                                <div>
                                    <p>Estatus:</p>
                                    <p @if ($ticket->estatus == 'Asignado') style="color: #3498DB; font-weight: 700; letter-spacing: 0.5px;" @endif
                                        @if ($ticket->estatus == 'En proceso') style="color: #f4d03f; font-weight: 700; letter-spacing: 0.5px;" @endif
                                        @if ($ticket->estatus == 'Completado') style="color: #5cc186; font-weight: 700; letter-spacing: 0.5px;" @endif
                                        @if ($ticket->estatus == 'No solucionado') style="color: #F39C12; font-weight: 700; letter-spacing: 0.5px;" @endif
                                        @if ($ticket->estatus == 'Cancelado') style="color: #fa6e6e; font-weight: 700; letter-spacing: 0.5px;" @endif>
                                        {{ $ticket->estatus }} </p>
                                </div>
                                <p>Fecha: {{ $ticket->created_at }}</p>
                            </div>
                            <div class="detallado">
                                <p> {{Auth::user()->name}} {{Auth::user()->apellido_p}} {{Auth::user()->apellido_m}}</p>
                                <p>Departamento: {{ $ticket->cliente->departamento->nombre }}</p>

                                <p>Problematica: {{ $ticket->problema }}</p>
                                <p>Detalles: {{ $ticket->detalles }}</p>
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
                @endforeach    

            </div>
        </section>

    </main>

@endsection
