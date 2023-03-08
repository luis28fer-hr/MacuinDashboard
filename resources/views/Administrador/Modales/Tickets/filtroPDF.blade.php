<form action="{{route('Tickets.reporte.filtro')}}" method="POST">
    @csrf
    <div id="myModal_PDF" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h2>Generar PDF por: </h2>
                <i class="fa-solid fa-xmark" onclick="modalOcultarPDF()"></i>
            </div>

            <div class="modal-body">
                <div>
                    <p><span></span>Seleccione un auxiliar:</p>
                    <select name="auxiliar" id="">
                        <option value="0" selected>Todos</option>
                        @foreach ($consultaAuxiliares as $auxiliar)
                            <option value="{{$auxiliar->id}}">{{ $auxiliar->name }} {{ $auxiliar->apellido_p }} {{ $auxiliar->apellido_m }}</option>
                        @endforeach
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
                <a onclick="modalOcultarPDF()" class="_cancel close">Cancelar</a>
                <span>&nbsp&nbsp</span>
                <button type="submit" class="_save">Guardar</button>
            </div>
        </div>

    </div>

</form>
