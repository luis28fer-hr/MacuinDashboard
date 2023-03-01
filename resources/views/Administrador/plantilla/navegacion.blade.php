<header>
    <nav>
        <div class="nav_header">
            <div class="settings">
                <a id="myBtn"><i class="fa-solid fa-gear"></i></a>
                @include('Administrador/Modales/Perfil')

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
                <li class="{{request()->routeIs('Principal')? 'link__activo':''}}">
                    <div></div><a href="{{route('Principal')}}" class="{{request()->routeIs('Principal')? '__activo':''}}"><i class="fa-solid fa-house"></i>Dashboard</a>
                </li>
                <li class="{{request()->routeIs('Auxiliares*')? 'link__activo':''}}">
                    <div></div><a href="{{route('Auxiliares')}}" class="{{request()->routeIs('Auxiliares*')? '__activo':''}}"><i class="fa-solid fa-user-tie"></i>Auxiliares</a>
                </li>
                <li class="{{request()->routeIs('Clientes*')? 'link__activo':''}}">
                    <div></div><a href="{{route('Clientes')}}" class="{{request()->routeIs('Clientes*')? '__activo':''}}"><i class="fa-solid fa-users"></i>Clientes</a>
                </li>
                <li class="{{request()->routeIs('Departamentos*')? 'link__activo':''}}">
                    <div></div><a href="{{route('Departamentos')}}" class="{{request()->routeIs('Departamentos*')? '__activo':''}}"><i class="fa-solid fa-building"></i>Departamentos</a>
                </li>
                <li class="{{request()->routeIs('Tickets*')? 'link__activo':''}}">
                    <div></div><a href="{{route('Tickets')}}" class="{{request()->routeIs('Tickets*')? '__activo':''}}"><i class="fa-solid fa-ticket"></i>Tickets</a>
                </li>
            </ul>
        </div>
        <div class="nav_footer">
            <ul>
                <li>
                    <a id="myBtn_logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Salir</a>
                    @include('Administrador/Modales/Salir')
                </li>
            </ul>
        </div>
    </nav>
</header>
