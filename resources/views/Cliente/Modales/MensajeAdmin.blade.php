
    <div id="myModal_MensajeAux-{{ $ticket->id_ticket }}" class="modal myModal_MensajeAux">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h2>Comentarios del Administrador</h2>
                <i class="fa-solid fa-xmark" onclick="Cerrar_verMensajesAdmin({{ $ticket->id_ticket }})"></i>
            </div>
            <div class="modal-body-tickets">
                 @foreach ($ticket->comentarioAdminCli as $mensaje)
                    <div class="mensaje">
                        <p>{{$mensaje->comentario}}</p>
                    </div>
                @endforeach 
            </div>
        </div>

    </div>


