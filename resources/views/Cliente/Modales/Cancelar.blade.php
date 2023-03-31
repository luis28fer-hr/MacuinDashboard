
                        <div id="cancelTicket-{{ $ticket->id_ticket }}" class="modal">


                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2>¿Estas seguro de cancelar el ticket?</h2>
                                    <i onclick="Cerra_cancelTicket({{ $ticket->id_ticket }})" class="fa-solid fa-xmark"></i>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <p>El ticket ya no sera atendido</p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a onclick="Cerra_cancelTicket({{ $ticket->id_ticket }})" class="_volver">Regresar</a>
                                    <form action="{{route('cli.cancel', $ticket->id_ticket)}}" method="POST">
                                        @csrf
                                        {!!method_field('PUT')!!}
                                        <button type="submit" class="_cancelar">Sí, de acuerdo</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!-- Fin de modal para cerrar sesion -->
