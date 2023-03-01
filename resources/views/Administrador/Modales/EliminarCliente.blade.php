<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    @method('delete')
    <!-- Modal para eliminar un Cliente -->
    <div id="myModal_DeleteCli-{{$consul->id}}" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h2>¿Estas seguro de eliminar este cliente?</h2>
                <i onclick="modalEliminarOcultar({{ $consul->id }})" class="fa-solid fa-xmark"></i>
            </div>
            <div class="modal-body">
                <div class="center">
                    <p><span>{{ $consul->name }} {{ $consul->apellido_p }} {{ $consul->apellido_m }}</span></p>
                </div>
            </div>
            <div class="modal-footer">
                <a onclick="modalEliminarOcultar({{ $consul->id }})" class="_cancel close_DeleteCli">Cancelar</a>
                <span>&nbsp&nbsp</span>
                <button type="submit" class="_salir">Eliminar</button>
            </div>
        </div>

    </div>
    <!-- Fin de modal para eliminar un Cliente -->
</form>
