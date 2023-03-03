<form action="" method="POST">

    <div id="myModal_AsigAux-{{$ticket->id_ticket}}" class="modal myModal_AsigAux">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h2>Seleccione un Auxiliar para este Ticket</h2>
                <i class="fa-solid fa-xmark" onclick="modalOcultarAsignarAuxiliar({{$ticket->id_ticket}})"></i>
            </div>
            <div class="modal-body">
                <div class="auxiliares-container-tickets">

                    @foreach($consultaAuxiliares as $auxiliar)

                    <div class="auxiliares-card-tickets">
                        <div class="img-container-tickets">
                            <img src="{{ $auxiliar->url_foto }}" alt="FotodePerfil">
                        </div>
                        <div class="auxiliares-name-tickets">
                            <p>{{ $auxiliar->name }} {{ $auxiliar->apellido_p }} {{ $auxiliar->apellido_m }}aaaaaaaaa</p>
                        </div>
                        <div class="auxiliares-data-tickets">
                            <p>ID: {{ $auxiliar->id }}</p>
                        </div>
                        <div class="auxiliares-bar-tickets">
                            <p class="">60 %</p>
                        </div>
                        <div class="auxiliares-btns-tickets">
                            <a href="{{route('Tickets.actualizar', [$ticket->id_ticket,  $auxiliar->id])}}" class="btn-confirmar"><i class="fa-solid fa-check"></i></a>
                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
            <div class="modal-footer">
                <a class="_cancel close_DeleteAux" onclick="modalOcultarAsignarAuxiliar({{$ticket->id_ticket}})">Cancelar</a>
            </div>
        </div>

    </div>

</form>
