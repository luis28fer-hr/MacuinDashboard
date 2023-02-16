@extends('Administrador/plantilla/plantilla')

@section('titulo', 'Auxiliares')

@section('contenido_Administrador')

<main>
    <h1>Auxiliares</h1>
    <div class="auxiliares-options">
        <a id="myBtn_NewAux">Nuevo   <i class="fa-regular fa-square-plus"></i></a>
        @include('Administrador/Modales/NuevoAuxiliar') 
        <input type="text" value="Carga"><i class="fa-solid fa-filter"></i>
        <input type="text" value="Buscar por Nombre"><i class="fa-solid fa-magnifying-glass"></i>
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
                    <p>60 %</p>
                    <br>
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
                    <br>
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
                    <br>
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
                    <br>
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
                    <br>
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
                    <br>
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
                    <br>
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
                    <br>
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

