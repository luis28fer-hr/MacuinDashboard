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

    <main>

        <h1>Tickets</h1>
        <div class="tickets-options">
            <form method="" action="">
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


                <div class="tickets-card">
                    <div class="tickets-detalles">
                        <div class="general">
                            <p>ID: </p>
                            <div>
                                <p>Auxiliar:</p>
                                <p>Benjamin</p>
                            </div>
                            <div>
                                <p>Estatus:</p>
                                <p>Asignado</p>
                            </div>
                            <p>Fecha: 28/05/2023 </p>
                        </div>
                        <div class="detallado">
                            <p>Nombre cliente</p>
                            <p>Departamento: </p>

                            <p>Problematica: </p>
                            <p>Detalles: </p>
                        </div>
                    </div>
                    <div class="tickets-btns-aux">

                        <div class="btns-cli">
                            <a onclick="modalMensajeAdmAuxiliar()" class="btn"
                                title="Ver comentarios del Administrador"><i class="fa-solid fa-user-tie"></i></a>
                            <a onclick="modalMensajeAuxiliarClie()" class="btn" title="Enviar comentario a Cliente"><i
                                    class="fa-regular fa-message"></i></a>
                        </div>

                        <form action="">

                            <div class="btns-status">
                                <select name="" id="" title="Actualizar el estatus del ticket">
                                    <option value="" selected>En proceso</option>
                                    <option value="">Asignado</option>
                                    <option value="">Cancelado</option>
                                    <option value="">No solucionado</option>
                                </select>
                                <button type="submit" title="Confirmar estatus"><i
                                        class="fa-solid fa-circle-check"></i></button>
                            </div>

                        </form>

                        <div class="btns-repo">
                            <a href="" target="_blank" class="btn" title="Generar PDF"><i
                                    class="fa-solid fa-file-pdf"></i></a>
                        </div>
                    </div>
                    @include('Auxiliar/Modales/MensajeAdmin')
                    @include('Auxiliar/Modales/MensajeCliente')
                </div>


            </div>
        </section>

    </main>

@endsection
