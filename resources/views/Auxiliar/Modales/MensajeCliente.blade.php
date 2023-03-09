<form action="" method="">
    @csrf
    <div id="myModal_MensajeCli" class="modal myModal_MensajeCli">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h2>Comentarios con el Cliente</h2>
                <i class="fa-solid fa-xmark" onclick="modalOcultarMensajeAuxiliarClie()"></i>
            </div>
            <div class="modal-body-tickets">

                    <div class="mensaje">
                        <p>Todos los comentarios que se envian a este ticket de parte del auxiliar</p>
                    </div>

            </div>
            <div class="modal-footer-tickets">

                <textarea name="comentario" placeholder="Escriba un mensaje"></textarea>
                <button type="submit" title="Enviar"><i class="fa-solid fa-paper-plane"></i></button>

            </div>
        </div>

    </div>

</form>
