@extends('Administrador/plantilla/plantilla')

@section('titulo', 'Tickets')

@section('contenido_Administrador')

    <main>

        <h1>Departamentos</h1>
        <div class="tickets-options">
            <div class="filtros">
                <div>
                    <select name="" id="">
                        <option value="" selected disabled>Estatus</option>
                        <option value="">10%</option>
                    </select>
                </div>
                <div>
                    <select name="" id="">
                        <option value="" selected disabled>Departamento</option>
                        <option value="">10%</option>
                    </select>
                </div>
            </div>
            <div class="filtros">
                <form action="">
                    <div>
                        <input type="date" placeholder="Fecha" name="searchFecha">
                    </div>
                </form>
                <a href="" class="reporte">Reporte <i class="fa-solid fa-file-pdf"></i></a>
            </div>
        </div>
        <hr>

        <section class="tickets">

            <div class="tickets-container">
                <div class="tickets-card">
                    <div class="tickets-detalles">
                        <div class="general">
                            <p>ID: 702819</p>
                            <div>
                                <p>Auxiliar:</p>
                                <p>Carlos Peña Rodriguez
                                <p>
                            </div>
                            <div>
                                <p>Estatus:</p>
                                <p>Asignado</p>
                            </div>
                        </div>
                        <div class="detallado">
                            <p>Cliente: Hernandez Reyes Luis Fernando</p>
                            <p>Departamento: Contabilidad</p>
                            <p>Fecha: 02/02/2023</p>
                            <p>Problematica: Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt, magni?</p>
                        </div>
                    </div>
                    <div class="tickets-btns">
                        <div class="btns-aux">
                            <a class="btn"><i class="fa-solid fa-user-tie"></i></a>
                            <a class="btn" href=""><i class="fa-regular fa-message"></i></a>
                        </div>
                        <div class="btns-cli">
                            <a class="btn"><i class="fa-solid fa-users"></i></a>
                            <a class="btn" href=""><i class="fa-regular fa-message"></i></a>
                        </div>
                        <div class="btns-repo">
                            <a class="btn"><i class="fa-solid fa-file-pdf"></i></a>

                        </div>
                    </div>

                </div>
                <div class="tickets-card">
                    <div class="tickets-detalles">
                        <div class="general">
                            <p>ID: 702819</p>
                            <div>
                                <p>Auxiliar:</p>
                                <p>Carlos Peña Rodriguez
                                <p>
                            </div>
                            <div>
                                <p>Estatus:</p>
                                <p>Asignado</p>
                            </div>
                        </div>
                        <div class="detallado">
                            <p>Cliente: Hernandez Reyes Luis Fernando</p>
                            <p>Departamento: Contabilidad</p>
                            <p>Fecha: 02/02/2023</p>
                            <p>Problematica: Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt, magni?</p>
                        </div>
                    </div>
                    <div class="tickets-btns">
                        <div class="btns-aux">
                            <a class="btn"><i class="fa-solid fa-user-tie"></i></a>
                            <a class="btn" href=""><i class="fa-regular fa-message"></i></a>
                        </div>
                        <div class="btns-cli">
                            <a class="btn"><i class="fa-solid fa-users"></i></a>
                            <a class="btn" href=""><i class="fa-regular fa-message"></i></a>
                        </div>
                        <div class="btns-repo">
                            <a class="btn"><i class="fa-solid fa-file-pdf"></i></a>

                        </div>
                    </div>

                </div>
                <div class="tickets-card">
                    <div class="tickets-detalles">
                        <div class="general">
                            <p>ID: 702819</p>
                            <div>
                                <p>Auxiliar:</p>
                                <p>Carlos Peña Rodriguez
                                <p>
                            </div>
                            <div>
                                <p>Estatus:</p>
                                <p>Asignado</p>
                            </div>
                        </div>
                        <div class="detallado">
                            <p>Cliente: Hernandez Reyes Luis Fernando</p>
                            <p>Departamento: Contabilidad</p>
                            <p>Fecha: 02/02/2023</p>
                            <p>Problematica: Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt, magni?</p>
                        </div>
                    </div>
                    <div class="tickets-btns">
                        <div class="btns-aux">
                            <a class="btn"><i class="fa-solid fa-user-tie"></i></a>
                            <a class="btn" href=""><i class="fa-regular fa-message"></i></a>
                        </div>
                        <div class="btns-cli">
                            <a class="btn"><i class="fa-solid fa-users"></i></a>
                            <a class="btn" href=""><i class="fa-regular fa-message"></i></a>
                        </div>
                        <div class="btns-repo">
                            <a class="btn"><i class="fa-solid fa-file-pdf"></i></a>

                        </div>
                    </div>

                </div>
                <div class="tickets-card">
                    <div class="tickets-detalles">
                        <div class="general">
                            <p>ID: 702819</p>
                            <div>
                                <p>Auxiliar:</p>
                                <p>Carlos Peña Rodriguez
                                <p>
                            </div>
                            <div>
                                <p>Estatus:</p>
                                <p>Asignado</p>
                            </div>
                        </div>
                        <div class="detallado">
                            <p>Cliente: Hernandez Reyes Luis Fernando</p>
                            <p>Departamento: Contabilidad</p>
                            <p>Fecha: 02/02/2023</p>
                            <p>Problematica: Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt, magni?</p>
                        </div>
                    </div>
                    <div class="tickets-btns">
                        <div class="btns-aux">
                            <a class="btn"><i class="fa-solid fa-user-tie"></i></a>
                            <a class="btn" href=""><i class="fa-regular fa-message"></i></a>
                        </div>
                        <div class="btns-cli">
                            <a class="btn"><i class="fa-solid fa-users"></i></a>
                            <a class="btn" href=""><i class="fa-regular fa-message"></i></a>
                        </div>
                        <div class="btns-repo">
                            <a class="btn"><i class="fa-solid fa-file-pdf"></i></a>

                        </div>
                    </div>

                </div>

            </div>
        </section>

    </main>

@endsection
