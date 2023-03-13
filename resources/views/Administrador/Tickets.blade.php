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
    @if (session()->has('selectFiltro'))
        {!! "<script> Swal.fire({
                    icon: 'info',
                    title: '¡Por favor ingrese un campo de filtrado!',
                    text: 'Administrador',
                    })</script> " !!}
    @endif
    @if (session()->has('noExiste'))
        {!! "<script> Swal.fire({
                    icon: 'info',
                    title: '¡No existe ningun ticket con estas caracteristicas!',
                    text: 'Administrador',
                    })</script> " !!}
    @endif
    @if (session()->has('sinRegistros'))
        {!! "<script> Swal.fire({
                    icon: 'info',
                    title: '¡No existe ningun ticket con estas caracteristicas!',
                    text: 'Administrador',
                    })</script> " !!}
    @endif

    <main>

        <h1>Tickets</h1>
        <div class="tickets-options">
            <form method="" action="{{ route('Tickets.buscar') }}">
                <div class="filtros">
                    <div>
                        <select name="searchByEstatus" id="">
                            <option value="" selected disabled>Estatus</option>
                            <option value="Asignado">Asignado</option>
                            <option value="En Proceso">En Proceso</option>
                            <option value="Completado">Completado</option>
                            <option value="No Solucionado">No Solucionado</option>
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
                <a onclick="modalPDF()" class="reporte">Reporte <i class="fa-solid fa-file-pdf"></i></a>
            </div>
        </div>
        @include('Administrador/Modales/Tickets/filtroPDF')
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
                        <div class="tickets-btns">
                            <div class="btns-aux">
                                <a title="Asignar un auxiliar" onclick="modalAsignarAuxiliar({{ $ticket->id_ticket }})"
                                    class="btn"><i class="fa-solid fa-user-tie"></i></a>
                                <a title="Enviar comentario al auxiliar"
                                    onclick="modalMensajeAuxiliar({{ $ticket->id_ticket }})" class="btn"><i
                                        class="fa-regular fa-message"></i></a>
                            </div>

                            <div class="btns-cli">
                                <a class="btn"><i class="fa-solid fa-users"></i></a>
                                <a onclick="modalMensajeCliente({{ $ticket->id_ticket }})" class="btn"><i
                                        class="fa-regular fa-message"></i></a>

                            </div>
                            <div class="btns-repo">
                                <a href="{{route('Tickets.reporte', $ticket->id_ticket)}}" target="_blank"  class="btn"><i class="fa-solid fa-file-pdf"></i></a>
                            </div>
                        </div>
                        @include('Administrador/Modales/Tickets/AsignarAuxiliar')
                        @include('Administrador/Modales/Tickets/MensajeAuxiliar')
                        @include('Administrador/Modales/Tickets/MensajeCliente')

                    </div>
                @endforeach

            </div>
        </section>

    </main>

@endsection
