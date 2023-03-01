@extends('Administrador/plantilla/plantilla')

@section('titulo', 'Clientes')

@section('contenido_Administrador')

    @if (session()->has('Nuevo_cliente'))
        {!! "<script> Swal.fire({
                    icon: 'success',
                    title: '¡Tus datos se han agregado!',
                    text: 'Administrador',
                    })</script> " !!}
    @endif

    @if (session()->has('Editar_cliente'))
        {!! "<script> Swal.fire({
                    icon: 'info',
                    title: '¡Tus datos se han actualizado!',
                    text: 'Administrador',
                    })</script> " !!}
    @endif

    @if (session()->has('Eliminar_cliente'))
        {!! "<script> Swal.fire({
                    icon: 'warning',
                    title: '¡Tus datos se han elimiado!',
                    text: 'Administrador',
                    })</script> " !!}
    @endif

    @if (session()->has('nocoincide_cliente'))
    {!! "<script> Swal.fire({
            icon: 'warning',
            title: '¡No existe cliente!',
            text: 'Administrador',
            })</script> " !!}
    @endif

<main>
    <h1>Clientes</h1>
        <div class="clientes-options">
            <a id="myBtn_NewCli"><i class="fa-regular fa-square-plus"> </i> Nuevo</a>
            @include('Administrador/Modales/NuevoCliente')
            <div class="filtros">
                <form action="">
                    <div>
                        <input type="text" placeholder="Buscar por Nombre" name="searchName">
                        <button class="btn_buscar" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <hr>

        <section class="clientes">

            <div class="clientes-container">
                @foreach ($consulClientes as $consul)
                    <div class="clientes-card">
                        <div class="img-container">
                            <img src="{{ $consul->url_foto }}" alt="FotodePerfil">
                        </div>
                        <div class="clientes-name">
                            <p>{{ $consul->name }} {{ $consul->apellido_p }} {{ $consul->apellido_m }}</p>
                        </div>
                        <div class="clientes-data">
                            <p>ID: {{ $consul->id }}</p>
                            <p>{{ $consul->email }}</p>
                            <p>Tel: {{ $consul->num_telefono }}</p>
                            <p>--------------------</p>
                        </div>
                        <div class="clientes-bar">
                            <p class="">{{ $consul->departamento->nombre }}</p>
                        </div>
                        <div class="clientes-btns">
                            <a onclick="modalEditarMostrarClie({{ $consul->id }})" class="btn-edit"><i
                                    class="fa-solid fa-pen"></i></a>
                            <a onclick="modalEliminarMostrarClie({{ $consul->id }})" class="btn-delete"><i
                                    class="fa-solid fa-trash-can"></i></a>
                        </div>
                        @include('Administrador/Modales/EditarCliente')
                        @include('Administrador/Modales/EliminarCliente')
                    </div>


                @endforeach
            </div>
        </section>

</main>

@endsection

