<form action="{{route('Departamentos.eliminar', $consul->id_departamento)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('delete')
    <!-- Modal para eliminar un Auxiliar -->
    <div id="myModal_DeleteDep-{{ $consul->id_departamento }}" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h2>¿Estas seguro de eliminar este Departamento?</h2>
                <i class="fa-solid fa-xmark" onclick="modalEliminarOculatrDepar({{ $consul->id_departamento }})"></i>
            </div>
            <div class="modal-body">
                <div class="center">
                    <p><span>{{ $consul->nombre }}</span></p>
                </div>
            </div>
            <div class="modal-footer">
                <a onclick="modalEliminarOculatrDepar({{ $consul->id_departamento }})" class="_cancel close_DeleteDep">Cancelar</a>
                <span>&nbsp&nbsp</span>
                <button type="submit" class="_salir">Eliminar</button>
            </div>
        </div>

    </div>
    <!-- Fin de modal para eliminar un Auxiliar -->
</form>