<form action="{{ route('Tickets.comentario.adminaux', $ticket->id_ticket) }}" method="POST">
    @csrf
    <div id="myModal_MensajeAux-{{ $ticket->id_ticket }}" class="modal myModal_MensajeAux">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h2>Comentarios con el Auxiliar</h2>
                <i class="fa-solid fa-xmark" onclick="modalOcultarMensajeAuxiliar({{ $ticket->id_ticket }})"></i>
            </div>
            <div class="modal-body-tickets">
                @foreach ($ticket->comentarioAdminAux as $mensaje)
                    <div class="mensaje">
                        <p>{{ $mensaje->comentario }}</p>
                    </div>
                @endforeach
            </div>
            <div class="modal-footer-tickets">

                <textarea name="comentario" placeholder="Escriba un mensaje"></textarea>
                <button type="submit" title="Enviar"><i class="fa-solid fa-paper-plane"></i></button>

            </div>
        </div>

    </div>

</form>
