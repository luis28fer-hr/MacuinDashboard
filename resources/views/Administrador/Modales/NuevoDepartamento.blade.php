
    <!-- Modal para añadir un nuevo auxiliar -->
    <div id="myModal_NewDep" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h2>Nuevo Departamento</h2>
                <i class="fa-solid fa-xmark close_NewDep"></i>
            </div>
            <div class="modal-body">
                <div>
                    <p><span>*</span> Nombre departamento:</p>
                    <input type="text" name="name" placeholder="Ej: Ventas" value="{{old('name')}}">
                    <span class="error">Este campo es obligatorio</span>
                </div>
                <div>
                    <p><span>*</span> Descripcion:</p>
                    <textarea type="text" name="descripcion" placeholder="Ej: Area de administracion sobre ventas y ..."></textarea>
                    <span class="error">Este campo es obligatorio</span>

                </div>
                <div>
                    <p><span>*</span> Foto de departamento:</p>
                    <input type="file" name="fotoPerfil" accept="image/*">
                    <span class="error">Este campo es obligatorio</span>
                </div>
            </div>
            <div class="modal-footer">
                <a href="" class="_cancel close_NewAux">Cancelar</a>
                <span>&nbsp&nbsp</span>
                <button type="submit" class="_save">Añadir</button>
            </div>
        </div>

    </div>
    <!-- Fin de modal para añadir un nuevo auxiliar -->
