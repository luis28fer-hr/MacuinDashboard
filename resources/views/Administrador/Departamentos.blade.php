@extends('Administrador/plantilla/plantilla')

@section('titulo', 'Departamentos')

@section('contenido_Administrador')

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
                <div class="departamento-card">
                    <div class="img-container">
                        <img src="storage/img/undraw_empty_cart_co35.png" alt="Img Perfil">
                    </div>
                    <div class="departamento-name">
                        <p>Compras</p>
                    </div>
                    <div class="departamento-data">
                        <p>ID: 708626</p>
                        <p>28-Enero-2023</p>
                        <p class="descripcion">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="departamento-btns">
                        <a id="myBtn_EditDep" class="btn-edit"><i class="fa-solid fa-pen"></i></a>
                        @include('Administrador/Modales/EditarDepartamento')
                        <a class="cantidad">90</a>
                        <a id="myBtn_DeleteDep"class="btn-delete"><i class="fa-solid fa-trash-can"></i></a>
                        @include('Administrador/Modales/EliminarDepartamento')

                    </div>
                </div>

                <div class="departamento-card">
                    <div class="img-container">
                        <img src="storage/img/undraw_Finance_re_gnv2.png" alt="Img Perfil">
                    </div>
                    <div class="departamento-name">
                        <p>Contabilidad</p>
                    </div>
                    <div class="departamento-data">
                        <p>ID: 708626</p>
                        <p>28-Enero-2023</p>
                        <p class="descripcion">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="departamento-btns">
                        <a id="myBtn_EditDep" class="btn-edit"><i class="fa-solid fa-pen"></i></a>
                        @include('Administrador/Modales/EditarDepartamento')

                        <a class="cantidad">90</a>
                        <a id="myBtn_DeleteDep"class="btn-delete"><i class="fa-solid fa-trash-can"></i></a>
                        @include('Administrador/Modales/EliminarDepartamento')
                    </div>
                </div>

                <div class="departamento-card">
                    <div class="img-container">
                        <img src="storage/img/undraw_logistics_x4dc.png" alt="Img Perfil">
                    </div>
                    <div class="departamento-name">
                        <p>Logistica</p>
                    </div>
                    <div class="departamento-data">
                        <p>ID: 708626</p>
                        <p>28-Enero-2023</p>
                        <p class="descripcion">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="departamento-btns">
                        <a id="myBtn_EditAux" class="btn-edit"><i class="fa-solid fa-pen"></i></a>
                        <a class="cantidad">90</a>
                        <a id="myBtn_DeleteAux"class="btn-delete"><i class="fa-solid fa-trash-can"></i></a>
                    </div>
                </div>

                <div class="departamento-card">
                    <div class="img-container">
                        <img src="storage/img/undraw_Projections_re_ulc6.png" alt="Img Perfil">
                    </div>
                    <div class="departamento-name">
                        <p>Produción</p>
                    </div>
                    <div class="departamento-data">
                        <p>ID: 708626</p>
                        <p>28-Enero-2023</p>
                        <p class="descripcion">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="departamento-btns">
                        <a id="myBtn_EditAux" class="btn-edit"><i class="fa-solid fa-pen"></i></a>
                        <a class="cantidad">90</a>
                        <a id="myBtn_DeleteAux"class="btn-delete"><i class="fa-solid fa-trash-can"></i></a>
                    </div>
                </div>

                <div class="departamento-card">
                    <div class="img-container">
                        <img src="storage/img/undraw_Credit_card_re_blml.png" alt="Img Perfil">
                    </div>
                    <div class="departamento-name">
                        <p>Ventas</p>
                    </div>
                    <div class="departamento-data">
                        <p>ID: 708626</p>
                        <p>28-Enero-2023</p>
                        <p class="descripcion">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="departamento-btns">
                        <a id="myBtn_EditAux" class="btn-edit"><i class="fa-solid fa-pen"></i></a>
                        <a class="cantidad">90</a>
                        <a id="myBtn_DeleteAux"class="btn-delete"><i class="fa-solid fa-trash-can"></i></a>
                    </div>
                </div>

            </div>

        </section>


    </main>
@endsection
