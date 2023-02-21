<form action="{{route('newauxiliares')}}" method="POST" enctype="multipart/form-data">
    @csrf 
    
    <!-- Modal para añadir un nuevo auxiliar -->
    <div id="myModal_NewAux" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h2>Nuevo Auxiliar</h2>
                <i class="fa-solid fa-xmark close_NewAux"></i>
            </div>
            <div class="modal-body">
                <div>
                    <p><span>*</span> Nombre:</p>
                    <input type="text" name="name" placeholder="Ej: Arturo" value="{{old('name')}}">
                    <span class="error">{{$errors->first('name')}}</span>
                </div>
                <div>
                    <p><span>*</span> Apellido Paterno:</p>
                    <input type="text" name="apellido_p" placeholder="Ej: Duran" value="{{old('apellido_p')}}">
                    <span class="error">{{$errors->first('apellido_p')}}</span>

                </div>
                <div>
                    <p><span>*</span> Apellido Materno:</p>
                    <input type="text" name="apellido_m" placeholder="Ej: Hernandez" value="{{old('apellido_m')}}">
                    <span class="error">{{$errors->first('apellido_m')}}</span>
                </div>
                <div>
                    <p><span>*</span> Foto de perfil:</p>
                    <input type="file" name="fotoPerfil" accept="image/*">
                    <span class="error">{{$errors->first('fotoPerfil')}}</span>
                </div>
                <div>
                    <p><span>*</span> Celular:</p>
                    <input type="text" name="numCel" placeholder="ej: 448123649" value="{{old('numCel')}}">
                    <span class="error">{{$errors->first('numCel')}}</span>
                </div>
                <div>
                    <p><span>*</span> Correo Electronico:</p>
                    <input type="text" name="email" placeholder="aaaa@gmail.com" value="{{old('email')}}">
                    <span class="error">{{$errors->first('email')}}</span>
                </div>
                <div>
                    <p><span>*</span> Contraseña:</p>
                    <input type="text" name="pass" placeholder="********" value="{{old('pass')}}">
                    <span class="error">{{$errors->first('pass')}}</span>
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
</form>