@extends('Auxiliar/plantilla/plantilla')

@section('titulo', 'Tickets')

@section('contenido_Auxiliar')


    @if (session()->has('activa_sesion'))
        {!! "<script> Swal.fire({
            title: '¡Bienvenido!',
            text: 'Auxiliar!',
            icon: 'success',
        })</script> " !!}
    @endif

    @if (session()->has('perfil_actualizado'))
        {!! "<script> Swal.fire({
            icon: 'success',
            title: 'Perfil Actualizado!',
            text: 'Auxiliar!',
            })</script> " !!}
    @endif


    @if (session()->has('Actualizado'))
        {!! "<script> Swal.fire({
            icon: 'success',
            title: '¡Estatus Actualizado!',
            text: 'Auxiliar!',
            })</script> " !!}
    @endif
    @if (session()->has('MensajeEnviado'))
        {!! "<script> Swal.fire({
            icon: 'success',
            title: '¡Comentario enviado!',
            text: 'Auxiliar!',
            })</script> " !!}
    @endif
    @if (session()->has('MensajeNoEnviado'))
        {!! "<script> Swal.fire({
            icon: 'warning',
            title: '¡Por favor escriba un comentario!',
            text: 'Auxiliar!',
            })</script> " !!}
    @endif
    @if (session()->has('selectFiltro'))
        {!! "<script> Swal.fire({
            icon: 'info',
            title: '¡Por favor ingrese un campo de filtrado!',
            text: 'Auxiliar!',
            })</script> " !!}
    @endif
    @if (session()->has('noExiste'))
        {!! "<script> Swal.fire({
            icon: 'info',
            title: '¡No existe ningun ticket con estas caracteristicas!',
            text: 'Auxiliar!',
            })</script> " !!}
    @endif

    @if (session()->has('sinRegistros'))
        {!! "<script> Swal.fire({
                    icon: 'info',
                    title: '¡No existe ningun ticket con estas caracteristicas!',
                    text: 'Auxiliar!',
                    })</script> " !!}
    @endif

    @if (session()->has('error_email'))
    {!!"<script> Swal.fire({
        icon: 'error',
        title: '¡Por favor use otro correo!',
        text: 'Auxiliar',
        })</script> "!!}
    @endif

    <main>

        <h1>Tickets</h1>
        <div class="tickets-options">

            <form method="" action="{{route('aux.tickets.buscar')}}" >

                <div class="filtros">
                    <div>
                        <select name="searchByEstatus" id="">
                            <option value="" selected disabled>Estatus</option>
                            <option value="Asignado">Asignado</option>
                            <option value="En proceso">En Proceso</option>
                            <option value="Completado">Completado</option>
                            <option value="No solucionado">No Solucionado</option>
                            <option value="Cancelado">Cancelado</option>
                        </select>
                    </div>
                    <div>
                        <select name="searchByDepartamento" id="">
                            <option value="" selected disabled>Departamento</option>
                            @foreach ($consulDepartaments as $departamentos)
                                <option value={{ $departamentos->id_departamento }}>{{ $departamentos->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <input type="date" placeholder="Fecha" name="searchByFecha">
                    </div>
                    <div>
                        <button class="btn_buscarTicket" type="submit"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </div>
            </form>
            <div class="filtros">
                <a onclick="modalPDFaux()" class="reporte">Reporte <i class="fa-solid fa-file-pdf"></i></a>
            </div>
        </div>
        @include('Auxiliar/Modales/filtroPDF')

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
                                        {{ $ticket->estatus }}</p>
                                </div>
                                <p>Fecha: {{ $ticket->created_at }}</p>
                            </div>
                            <div class="detallado">
                                <p>{{ $ticket->cliente->datos->name }} {{ $ticket->cliente->datos->apellido_p }}
                                    {{ $ticket->cliente->datos->apellido_m }}</p>
                                <p>Departamento: {{ $ticket->cliente->departamento->nombre }}</p>

                                <p>Problematica: {{ $ticket->problema }}</p>
                                <p>Detalles: {{ $ticket->detalles }}</p>
                            </div>
                        </div>
                        <div class="tickets-btns-aux">

                            <div class="btns-cli">
                                <a onclick="modalMensajeAdmAuxiliar({{ $ticket->id_ticket }})" class="btn"
                                    title="Ver comentarios del Administrador"><i class="fa-solid fa-user-tie"></i></a>
                                    @include('Auxiliar/Modales/MensajeAdmin')
                                <a onclick="modalMensajeAuxiliarClie({{ $ticket->id_ticket }})" class="btn"
                                    title="Enviar comentario a Cliente"><i class="fa-regular fa-message"></i></a>
                                    @include('Auxiliar/Modales/MensajeCliente')
                            </div>

                            <form action="{{route('aux.actualizar', $ticket->id_ticket)}}" method="POST">
                                @csrf
                                {!!method_field('PUT')!!}
                                <div class="btns-status">
                                    <select name="updateStatus" id="" title="Actualizar el estatus del ticket">
                                        <option value="{{$ticket->estatus}}" selected>{{ $ticket->estatus }}</option>
                                        <option value="En proceso">En proceso</option>
                                        <option value="Completado">Completado</option>
                                        <option value="No solucionado">No solucionado</option>
                                    </select>
                                    <button type="submit" title="Confirmar estatus"><i
                                            class="fa-solid fa-circle-check"></i></button>
                                </div>

                            </form>

                            <div class="btns-repo">

                                <a href="{{route('aux.tickets.reporte', $ticket->id_ticket)}}" target="_blank" class="btn" title="Generar PDF"><i
                                        class="fa-solid fa-file-pdf"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </section>

    </main>

@endsection
