@extends('Administrador/plantilla/plantilla')

@section('titulo', 'Auxiliares')

@section('contenido_Administrador')

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
           <div>
            <input type="text" placeholder="Buscar por Nombre"><i class="fa-solid fa-magnifying-glass"></i>
           </div>
        </div>
    </div>
    <hr>

    <section class="auxiliares">
        <div class="auxiliares-container">
            <div class="auxiliares-card">
                <div>
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Img Perfil">
                </div>
                <div class="auxiliares-name">
                    <p>Angelique Boyer Diaz</p>
                </div>
                <div  class="auxiliares-data">
                    <p>ID: 708626</p>
                    <p>boyer@macuin.com</p>
                    <p>Matutino</p>
                    <p>5579813307</p>
                </div>
                <div class="auxiliares-bar">
                    <p class="">60 %</p>
                </div>
                <div class="auxiliares-btns">
                    <a href="" class="btn-edit"><i class="fa-solid fa-pen"></i></a>
                    <a href="" class="btn-delete"><i class="fa-solid fa-trash-can"></i></a>
                </div>
            </div>
            <div class="auxiliares-card">
                <div>
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Img Perfil">
                </div>
                <div class="auxiliares-name">
                    <p>Angelique Boyer Diaz</p>
                </div>
                <div  class="auxiliares-data">
                    <p>ID: 708626</p>
                    <p>boyer@macuin.com</p>
                    <p>Matutino</p>
                    <p>5579813307</p>
                </div>
                <div class="auxiliares-bar">
                    <p>60 %</p>

                </div>
                <div class="auxiliares-btns">
                    <a href="" class="btn-edit"><i class="fa-solid fa-pen"></i></a>
                    <a href="" class="btn-delete"><i class="fa-solid fa-trash-can"></i></a>
                </div>
            </div>
            <div class="auxiliares-card">
                <div>
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Img Perfil">
                </div>
                <div class="auxiliares-name">
                    <p>Angelique Boyer Diaz</p>
                </div>
                <div  class="auxiliares-data">
                    <p>ID: 708626</p>
                    <p>boyer@macuin.com</p>
                    <p>Matutino</p>
                    <p>5579813307</p>
                </div>
                <div class="auxiliares-bar">
                    <p>60 %</p>

                </div>
                <div class="auxiliares-btns">
                    <a href="" class="btn-edit"><i class="fa-solid fa-pen"></i></a>
                    <a href="" class="btn-delete"><i class="fa-solid fa-trash-can"></i></a>
                </div>
            </div>
            <div class="auxiliares-card">
                <div>
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Img Perfil">
                </div>
                <div class="auxiliares-name">
                    <p>Angelique Boyer Diaz</p>
                </div>
                <div  class="auxiliares-data">
                    <p>ID: 708626</p>
                    <p>boyer@macuin.com</p>
                    <p>Matutino</p>
                    <p>5579813307</p>
                </div>
                <div class="auxiliares-bar">
                    <p>60 %</p>

                </div>
                <div class="auxiliares-btns">
                    <a href="" class="btn-edit"><i class="fa-solid fa-pen"></i></a>
                    <a href="" class="btn-delete"><i class="fa-solid fa-trash-can"></i></a>
                </div>
            </div>
            <div class="auxiliares-card">
                <div>
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Img Perfil">
                </div>
                <div class="auxiliares-name">
                    <p>Angelique Boyer Diaz</p>
                </div>
                <div  class="auxiliares-data">
                    <p>ID: 708626</p>
                    <p>boyer@macuin.com</p>
                    <p>Matutino</p>
                    <p>5579813307</p>
                </div>
                <div class="auxiliares-bar">
                    <p>60 %</p>

                </div>
                <div class="auxiliares-btns">
                    <a href="" class="btn-edit"><i class="fa-solid fa-pen"></i></a>
                    <a href="" class="btn-delete"><i class="fa-solid fa-trash-can"></i></a>
                </div>
            </div>
            <div class="auxiliares-card">
                <div>
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Img Perfil">
                </div>
                <div class="auxiliares-name">
                    <p>Angelique Boyer Diaz</p>
                </div>
                <div  class="auxiliares-data">
                    <p>ID: 708626</p>
                    <p>boyer@macuin.com</p>
                    <p>Matutino</p>
                    <p>5579813307</p>
                </div>
                <div class="auxiliares-bar">
                    <p>60 %</p>

                </div>
                <div class="auxiliares-btns">
                    <a href="" class="btn-edit"><i class="fa-solid fa-pen"></i></a>
                    <a href="" class="btn-delete"><i class="fa-solid fa-trash-can"></i></a>
                </div>
            </div>
            <div class="auxiliares-card">
                <div>
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Img Perfil">
                </div>
                <div class="auxiliares-name">
                    <p>Angelique Boyer Diaz</p>
                </div>
                <div  class="auxiliares-data">
                    <p>ID: 708626</p>
                    <p>boyer@macuin.com</p>
                    <p>Matutino</p>
                    <p>5579813307</p>
                </div>
                <div class="auxiliares-bar">
                    <p>60 %</p>

                </div>
                <div class="auxiliares-btns">
                    <a href="" class="btn-edit"><i class="fa-solid fa-pen"></i></a>
                    <a href="" class="btn-delete"><i class="fa-solid fa-trash-can"></i></a>
                </div>
            </div>
            <div class="auxiliares-card">
                <div>
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Img Perfil">
                </div>
                <div class="auxiliares-name">
                    <p>Angelique Boyer Diaz</p>
                </div>
                <div  class="auxiliares-data">
                    <p>ID: 708626</p>
                    <p>boyer@macuin.com</p>
                    <p>Matutino</p>
                    <p>5579813307</p>
                </div>
                <div class="auxiliares-bar">
                    <p>60 %</p>

                </div>
                <div class="auxiliares-btns">
                    <a href="" class="btn-edit"><i class="fa-solid fa-pen"></i></a>
                    <a href="" class="btn-delete"><i class="fa-solid fa-trash-can"></i></a>
                </div>
            </div>
        </div>
    </section>


</main>



@endsection

