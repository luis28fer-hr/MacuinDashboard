<form action="" method="POST">
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
                        <option value="0" selected>Todos</option>
                    </select>
                </div>
                <div>
                    <p><span></span>Seleccione un departamento:</p>
                    <select name="searchByDepartamento" id="">
                        <option value="0" selected >Todos</option>
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
