
    <div id="myModal_MensajeCli-{{ $ticket->id_ticket }}" class="modal myModal_MensajeCli">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h2>Comentarios del Auxiliar</h2>
                <i class="fa-solid fa-xmark" onclick="Cerrar_verMensajesAux({{ $ticket->id_ticket }})"></i>
            </div>
            <div class="modal-body-tickets">
{{--                 @foreach ($ticket->comentarioAuxCli as $mensaje)
                    <div class="mensaje">
                        <p>{{$mensaje->comentario}}</p>
                    </div>
                @endforeach --}}
            </div>
        </div>

    </div>

