<nav class="navbar navbar-default top-navbar" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html"><strong>GAMP</strong></a>
    </div>

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="{{asset('/index.php/clave')}}"><i class="fa fa-user fa-fw"></i> {{ \Auth::user()->name}} </a> </li>
                <li class="divider"></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out fa-fw"></i> Cerrar Sesion </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                      {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li>
        <li><ul>&nbsp;&nbsp;</ul></li>
        <li><ul>&nbsp;&nbsp;</ul></li>
    </ul>
</nav>
