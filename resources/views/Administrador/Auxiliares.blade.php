@extends('Administrador/plantilla/plantilla')

@section('titulo', 'Auxiliares')

@section('contenido_Administrador')

    @if (session()->has('Nuevo_auxiliar'))
        {!! "<script> Swal.fire({
                    icon: 'success',
                    title: '¡Auxiliar Registrado!',
                    text: 'Administrador',
                    })</script> " !!}
    @endif

    @if (session()->has('Editar_auxiliar'))
        {!! "<script> Swal.fire({
                    icon: 'info',
                    title: '¡Auxiliar actualizado correctamente!',
                    text: 'Administrador',
                    })</script> " !!}
    @endif

    @if (session()->has('Eliminar_auxiliar'))
        {!! "<script> Swal.fire({
                    icon: 'warning',
                    title: '¡Auxiliar Eliminado!',
                    text: 'Administrador',
                    })</script> " !!}
    @endif

    @if (session()->has('error_email'))
        {!! "<script> Swal.fire({
                icon: 'error',
                title: '¡Por favor use otro correo!',
                text: 'Administrador',
                })</script> " !!}
    @endif

    @if (session()->has('nocoincide_auxiliar'))
    {!! "<script> Swal.fire({
            icon: 'warning',
            title: '¡No existe auxiliar!',
            text: 'Administrador',
            })</script> " !!}
    @endif

    <main>
        <h1>Auxiliares</h1>
        <div class="auxiliares-options">
            <a id="myBtn_NewAux"><i class="fa-regular fa-square-plus"> </i> Nuevo</a>
            @include('Administrador/Modales/NuevoAuxiliar')
            <div class="filtros">
                <div>
                    <select name="" id="">
                        <option value="" selected>Carga de trabajo</option>
                        <option value="">10%</option>
                    </select>
                </div>
                <form action="{{ route('Auxiliares.buscar') }}">
                    <div>
                        <input type="text" placeholder="Buscar por Nombre" name="searchName">
                        <button class="btn_buscar" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <hr>

        <section class="auxiliares">

            <div class="auxiliares-container">
                @foreach ($consulAuxiliares as $consul)
                    <div class="auxiliares-card">
                        <div class="img-container">
                            <img src="{{ $consul->url_foto }}" alt="FotodePerfil">
                        </div>
                        <div class="auxiliares-name">
                            <p>{{ $consul->name }} {{ $consul->apellido_p }} {{ $consul->apellido_m }}</p>
                        </div>
                        <div class="auxiliares-data">
                            <p>ID: {{ $consul->id }}</p>
                            <p>{{ $consul->email }}</p>
                            <p>Tel: {{ $consul->num_telefono }}</p>
                            <p>--------------------</p>
                        </div>
                        <div class="auxiliares-bar">
                            <p class="">60 %</p>
                        </div>
                        <div class="auxiliares-btns">
                            <a onclick="modalEditarMostrar({{ $consul->id }})" class="btn-edit"><i
                                    class="fa-solid fa-pen"></i></a>
                            <a onclick="modalEliminarMostrar({{ $consul->id }})" class="btn-delete"><i
                                    class="fa-solid fa-trash-can"></i></a>
                        </div>
                        @include('Administrador/Modales/EditarAuxiliar')
                        @include('Administrador/Modales/EliminarAuxiliar')
                    </div>


                @endforeach
            </div>
        </section>


    </main>



@endsection
