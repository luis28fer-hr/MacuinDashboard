<form action="{{route('aux.tickets.reporte.filtro')}}" target="_blank" method="POST">
    @csrf
    <div id="myModal_PDFaux" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h2>Generar PDF por: </h2>
                <i class="fa-solid fa-xmark" onclick="modalOcultarPDFaux()"></i>
            </div>

            <div class="modal-body">
                <div>
                    <p><span></span>Seleccione un estatus:</p>
                    <select name="auxiliar" id="">
                        <option value="0" selected >Todos</option>
                        <option value="Asignado">Asignado</option>
                        <option value="En proceso">En Proceso</option>
                        <option value="Completado">Completado</option>
                        <option value="No solucionado">No Solucionado</option>
                        <option value="Cancelado">Cancelado</option>
                    </select>
                </div>
                <div>
                    <p><span></span>Seleccione un departamento:</p>

                    <select name="searchByDepartamento" id="">
                        <option value="0" selected >Todos</option>
                        @foreach ($consulDepartaments as $departamentos)
                        <option value={{ $departamentos->id_departamento }}>{{ $departamentos->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <p><span></span>Seleccione una fecha:</p>
                    <input type="date" name="searchByFecha" id="">
                </div>
            </div>

            <div class="modal-footer">
                <a onclick="modalOcultarPDFaux()" class="_cancel close">Cancelar</a>
                <span>&nbsp&nbsp</span>
                <button type="submit" class="_save">Generar PDF</button>
            </div>
        </div>

    </div>

</form>
