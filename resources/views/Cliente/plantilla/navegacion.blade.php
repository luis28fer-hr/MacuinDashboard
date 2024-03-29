<header>
    <nav>
        <div class="nav_header">
            <div class="settings">
                <a id="myBtn"><i class="fa-solid fa-gear"></i></a>
                @include('Cliente/Modales/Perfil')

            </div>
            <div class="foto_perfil">
                <img src="{{Auth::user()->url_foto}}" alt="foto de perfil">
            </div>
            <div class="nombre_usuario">
                <p>{{Auth::user()->name}} {{Auth::user()->apellido_p}} {{Auth::user()->apellido_m}}</p>
            </div>
        </div>
        <div class="nav_body">
            <ul>
                <li class="{{request()->routeIs('cli.tickets*')? 'link__activo':''}}">
                    <div></div><a href="{{route('cli.tickets')}}" class="{{request()->routeIs('cli.tickets*')? '__activo':''}}"><i class="fa-solid fa-ticket"></i>Tickets</a>
                </li>
            </ul>
        </div>
        <div class="nav_footer">
            <ul>
                <li>
                    <a id="myBtn_logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Salir</a>
                    @include('Cliente/Modales/Salir')
                </li>
            </ul>
        </div>
    </nav>
</header>
