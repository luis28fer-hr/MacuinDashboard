<form action="{{route('Auxiliares.editar', $consul->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    {!! method_field('PUT')!!}
<!-- Modal para actualizar un auxiliar -->
<div id="myModal_EditAux-{{$consul->id}}" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <h2>Editar Auxiliar</h2>
            <i class="fa-solid fa-xmark"  onclick="modalEditarOcultar({{ $consul->id }})" ></i>
        </div>
        <div class="modal-body">
            <div>
                <p><span>*</span> Nombre:</p>
                <input type="text" name="name" placeholder="Ej: Arturo" value="{{ $consul->name }}">
                <span class="error">{{$errors->first('name')}}</span>
            </div>
            <div>
                <p><span>*</span> Apellido Paterno:</p>
                <input type="text" name="apellido_p" placeholder="Ej: Duran" value="{{ $consul->apellido_p }}">
                <span class="error">{{$errors->first('apellido_p')}}</span>

            </div>
            <div>
                <p><span>*</span> Apellido Materno:</p>
                <input type="text" name="apellido_m" placeholder="Ej: Hernandez" value="{{ $consul->apellido_m }}">
                <span class="error">{{$errors->first('apellido_m')}}</span>
            </div>
            <div>
                <p><span>*</span> Foto de perfil:</p>
                <input type="file" name="fotoPerfil" accept="image/*">
                <span class="error">{{$errors->first('fotoPerfil')}}</span>
            </div>
            <div>
                <p><span>*</span> Celular:</p>
                <input type="text" name="numCel" placeholder="ej: 448123649" value="{{ $consul->num_telefono }}">
                <span class="error">{{$errors->first('numCel')}}</span>
            </div>
            <div>
                <p><span>*</span> Correo Electronico:</p>
                <input type="text" name="email" placeholder="aaaa@gmail.com" value="{{ $consul->email }}">
                <span class="error">{{$errors->first('email')}}</span>
            </div>
        </div>
        <div class="modal-footer">
            <a class="_cancel close_EditAux" onclick="modalEditarOcultar({{ $consul->id }})">Cancelar</a>
            <span>&nbsp&nbsp</span>
            <button type="submit" class="_edit">Actualizar</button>
        </div>
    </div>

</div>
<!-- Fin de modal para actualizar un auxiliar -->
</form>
