<form action="{{route('perfil')}}" method="POST">
@csrf

<!-- Modal para editar perfil -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <h2>Actualizar mi perfil</h2>
            <i class="fa-solid fa-xmark close"></i>
        </div>
        <div class="modal-body">
            <div>
                <p><span>*</span> Nombre:</p>
                <input type="text" name="name" placeholder="Ej: Arturo" value="{{old('name')}}">
                <span class="error">{{$errors->first('name')}}</span>
            </div>
            <div>
                <p><span>*</span> Apellido Paterno:</p>
                <input type="text" name="apellido_p" placeholder="Ej: Villegas" value="{{old('apellido_p')}}">
                <span class="error">{{$errors->first('apellido_p')}}</span>
            </div>
            <div>
                <p><span>*</span> Apellido Materno:</p>
                <input type="text" name="apellido_m" placeholder="Ej: Vazquez" value="{{old('apellido_m')}}">
                <span class="error">{{$errors->first('apellido_m')}}</span>
            </div>
            <div>
                <p><span>*</span> Numero de telefono:</p>
                <input type="text" name="numTel" placeholder="ej: 448123649" value="{{old('numTel')}}">
                <span class="error">{{$errors->first('numTel')}}</span>
            </div>
            <div>
                <p><span>*</span> Foto de perfil:</p>
                <input type="file" name="fotoPerfil" placeholder="Nombre">
                <span class="error">{{$errors->first('fotoPerfil')}}</span>
            </div>
        </div>
        <div class="modal-footer">
            <a href="" class="_cancel close">Cancelar</a>
            <span>&nbsp&nbsp</span>
            <button type="submit" class="_save">Guardar</button>
        </div>
    </div>

</div>
<!-- Fin de modal para editar perfil -->
</form>
