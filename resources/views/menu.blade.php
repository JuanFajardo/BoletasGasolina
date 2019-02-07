<nav class="navbar-default navbar-side" role="navigation">
<div id="sideNav" href=""><i class="fa fa-caret-right"></i></div>
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <a @yield('menuProyecto') href="{{asset('index.php/Proyecto')}}"><i class="fa fa-desktop"></i> Proyectos</a>
            </li>
            <li>
                <a @yield('menuBoleta') href="{{asset('index.php/Boleta')}}"><i class="fa fa-bar-chart-o"></i> Boletas</a>
            </li>
            <li>
                <a @yield('menuCambio') href="{{asset('index.php/Cambio')}}"><i class="fa fa-qrcode"></i> Cambios</a>
            </li>
        </ul>
    </div>
</nav>
