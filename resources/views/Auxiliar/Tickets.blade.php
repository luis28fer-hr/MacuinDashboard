@extends('Auxiliar/plantilla/plantilla')

@section('titulo', 'Tickets')

@section('contenido_Auxiliar')


    @if (session()->has('activa_sesion'))
    {!!"<script> Swal.fire({
        icon: 'success',
        title: '¡Bienvenido!',
        text: 'Auxiliar!',
        })</script> "!!}
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
                <a href="" class="reporte">Reporte <i class="fa-solid fa-file-pdf"></i></a>
            </div>
        </div>
        <hr>

        <section class="tickets">

            <div class="tickets-container">

            </div>
        </section>

    </main>

@endsection
