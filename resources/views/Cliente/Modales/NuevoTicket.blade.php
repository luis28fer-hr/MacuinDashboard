<form action="{{ route('cli.newticket') }}" method="POST" enctype="multipart/form-data">
    @csrf

  
    <div id="newTicket" class="modal">


        <div class="modal-content">
            <div class="modal-header">
                <h2>Solicitar Ticket</h2>
                <i onclick="Cerrar_agregarTicket()" class="fa-solid fa-xmark"></i>
            </div>
            <div class="modal-body">
                <div>
                    <p><span>* </span>Problema:</p>
                    <select name="problema"  value="{{old('problema')}}">
                        <option selected disabled>Seleccione uno</option>
                        <option >Falla de office</option>
                        <option >Errores de software</option>
                        <option >Errores de software</option>
                        <option >Errores de hardware</option>
                        <option >Mantenimientos preventivos</option>
                        <option >Otro</option>
                    </select>
                    <span class="error">{{$errors->first('problema')}}</span>
                </div>
                <div>
                    <p><span>* </span>Detalles del problema:</p>
                    <textarea type="text" rows="5" name="detalles" placeholder="Especifica cual es el principal problema"
                        value="{{old('detalles')}}"></textarea>
                    <span class="error">{{$errors->first('detalles')}}</span>
                </div>
                <div>
                    <hr>
                </div>
                <div>
                    <p>Cliente:</p>
                    <input type="text" class="inpdis" value="{{Auth::user()->name}}" disabled>
                </div>
                <div>
                    <p>Fecha:</p>
                    <input type="datetime" class="inpdis" name="fecha" value="<?php echo date("Y-m-d");?>" disabled>
                </div>
            </div>
            <div class="modal-footer">
                <a onclick="Cerrar_agregarTicket()" class="_cancel close">Cancelar</a>
                <span>&nbsp&nbsp</span>
                <button type="submit" class="_save">Guardar</button>
            </div>
        </div>

    </div>
    <!-- Fin de modal para editar perfil -->
</form>
