@extends('Administrador/plantilla/plantilla')

@section('titulo', 'Departamentos')

@section('contenido_Administrador')

@if (session()->has('Nuevo_departamento'))
{!!"<script> Swal.fire({
    icon: 'success',
    title: '¡Tus datos se han agregado!',
    text: 'Administrador',
    })</script> "!!}
@endif

@if (session()->has('Editar_departamento'))
{!!"<script> Swal.fire({
    icon: 'success',
    title: '¡Tus datos se han actualizado!',
    text: 'Administrador',
    })</script> "!!}
@endif

    <main>
        <h1>Departamentos</h1>
        <div class="departamento-options">
            <a id="myBtn_NewDep"><i class="fa-regular fa-square-plus"> </i> Nuevo</a>

            @include('Administrador/Modales/NuevoDepartamento')

            <div class="filtros">
                <div>
                    <input type="text" placeholder="Buscar por Nombre"><i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </div>
        </div>
        <hr>

        <section class="departamento">

            <div class="departamento-container">
                @foreach($consulDepartamentos as $consul)
                <div class="departamento-card">
                    <div class="img-container">
                        <img src="storage/img/undraw_empty_cart_co35.png" alt="Img Perfil">
                    </div>
                    <div class="departamento-name">
                        <p>{{$consul->nombre}}</p>
                    </div>
                    <div class="departamento-data">
                        <p>ID: {{$consul->id_departamento}}</p>
                        <p>{{$consul->created_at}}</p>
                        <p class="descripcion">{{$consul->descripcion}}</p>
                    </div>
                    <div class="departamento-btns">
                        <a id="myBtn_EditDep" class="btn-edit"><i class="fa-solid fa-pen"></i></a>
                        @include('Administrador/Modales/EditarDepartamento')
                        <a class="cantidad">90</a>
                        <a id="myBtn_DeleteDep"class="btn-delete"><i class="fa-solid fa-trash-can"></i></a>
                        @include('Administrador/Modales/EliminarDepartamento')

                    </div>
                </div>
                @endforeach
            </div>

        </section>


    </main>
@endsection
