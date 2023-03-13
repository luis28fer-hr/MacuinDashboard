<form action="" method="">
    @csrf
    <div id="myModal_MensajeCli-{{$ticket->id_ticket}}" class="modal myModal_MensajeCli">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h2>Comentarios con el Cliente</h2>
                <i class="fa-solid fa-xmark" onclick="modalOcultarMensajeAuxiliarClie({{$ticket->id_ticket}})"></i>
            </div>
            <div class="modal-body-tickets">
                @foreach ($ticket->comentarioAuxCli as $mensaje)
                    <div class="mensaje">
                        <p>{{$mensaje->comentario}}</p>
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
