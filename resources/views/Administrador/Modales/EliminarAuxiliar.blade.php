                        <!-- Modal para eliminar un Auxiliar -->
                        <div id="myModal_DeleteAux-{{$consul->id}}" class="modal">

                            <!-- Modal content -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2>¿Estas seguro de eliminar este auxiliar?</h2>
                                    <i onclick="modalEliminarOcultar({{ $consul->id }})" class="fa-solid fa-xmark"></i>
                                </div>
                                <div class="modal-body">
                                    <div class="center">
                                        <p><span>Nombre Apellidop Apellidom</span></p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a onclick="modalEliminarOcultar({{ $consul->id }})" class="_cancel close_DeleteAux">Cancelar</a>
                                    <span>&nbsp&nbsp</span>
                                    <a href="" class="_salir">Eliminar</a>
                                </div>
                            </div>

                        </div>
                        <!-- Fin de modal para eliminar un Auxiliar -->
