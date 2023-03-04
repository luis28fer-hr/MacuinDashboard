@extends('Administrador/plantilla/plantilla')

@section('titulo', 'Tickets')

@section('contenido_Administrador')

@if (session()->has('Actualizado'))
{!! "<script> Swal.fire({
            icon: 'success',
            title: '¡Auxiliar asigando!',
            text: 'Administrador',
            })</script> " !!}
@endif
@if (session()->has('MensajeEnviado'))
{!! "<script> Swal.fire({
            icon: 'success',
            title: '¡Comentario enviado!',
            text: 'Administrador',
            })</script> " !!}
@endif
@if (session()->has('MensajeNoEnviado'))
{!! "<script> Swal.fire({
            icon: 'warning',
            title: '¡Por favor escriba un comentario!',
            text: 'Administrador',
            })</script> " !!}
@endif

    <main>

        <h1>Tickets</h1>
        <div class="tickets-options">
            <form action="">
                <div class="filtros">
                    <div>
                        <select name="" id="">
                            <option value="" selected disabled>Estatus</option>
                            <option value="">10%</option>
                        </select>
                    </div>
                    <div>
                        <select name="" id="">
                            <option value="" selected disabled>Departamento</option>
                            <option value="">10%</option>
                        </select>
                    </div>
                    <div>
                        <input type="date" placeholder="Fecha" name="searchFecha">
                    </div>
                    <div>
                        <button class="btn_buscarTicket" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </div>
            </form>
            <div class="filtros">
                <a href="" class="reporte">Reporte <i class="fa-solid fa-file-pdf"></i></a>
            </div>
        </div>
        <hr>

        <section class="tickets">

            <div class="tickets-container">

                @foreach($consultaTickets as $ticket)

                <div class="tickets-card">
                    <div class="tickets-detalles">
                        <div class="general">
                            <p>ID: {{$ticket->id_ticket}}</p>
                            <div>
                                <p>Auxiliar:</p>
                                <p>{{$ticket->auxiliar->datos->name}} {{$ticket->auxiliar->datos->apellido_p}} {{$ticket->auxiliar->datos->apellido_m}}</p>
                            </div>
                            <div>
                                <p>Estatus:</p>
                                <p @if($ticket->estatus == 'En proceso')
                                    style="color: #F39C12; font-weight: 700; letter-spacing: 0.5px;"
                                    @endif
                                    @if($ticket->estatus == 'Asignado')
                                    style="color: #3498DB; font-weight: 700; letter-spacing: 0.5px;"
                                    @endif
                                    >{{$ticket->estatus}}</p>
                            </div>
                            <p>Fecha: {{$ticket->created_at}}</p>
                        </div>
                        <div class="detallado">
                            <p>{{$ticket->cliente->datos->name}} {{$ticket->cliente->datos->apellido_p}} {{$ticket->cliente->datos->apellido_m}}</p>
                            <p>Departamento: {{$ticket->cliente->departamento->nombre}}</p>

                            <p>Problematica: {{$ticket->problema}}</p>
                            <p>Detalles: {{$ticket->detalles}}</p>
                        </div>
                    </div>
                    <div class="tickets-btns">
                        <div class="btns-aux">
                            <a title="Asignar un auxiliar" onclick="modalAsignarAuxiliar({{$ticket->id_ticket}})" class="btn"><i class="fa-solid fa-user-tie"></i></a>
                            @include('Administrador/Modales/Tickets/AsignarAuxiliar')
                            <a title="Enviar comentario al auxiliar" onclick="modalMensajeAuxiliar({{$ticket->id_ticket}})" class="btn"><i class="fa-regular fa-message"></i></a>
                            @include('Administrador/Modales/Tickets/MensajeAuxiliar')
                        </div>

                        <div class="btns-cli">
                            <a class="btn"><i class="fa-solid fa-users"></i></a>
                            <a onclick="modalMensajeCliente({{ $ticket->id_ticket }})" class="btn"><i class="fa-regular fa-message"></i></a>
                            @include('Administrador/Modales/Tickets/MensajeCliente')

                        </div>
                        <div class="btns-repo">
                            <a class="btn"><i class="fa-solid fa-file-pdf"></i></a>
                        </div>
                    </div>
                </div>

                @endforeach

            </div>
        </section>

    </main>

@endsection
