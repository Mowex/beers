<header class="row-fluid">
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	  <div class="container-fluid">
	    <div class="navbar-header">
	    	<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
	      <a class="navbar-brand" href="{{ url('home') }}">Caja-Cervecera</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li><a href="{{ url('cervezas') }}">Cervezas</a></li>
	      <li><a href="{{url('paquet-embriagues')}}">Paquet-Embriagues</a></li>
		@if (Auth::check() && Auth::user()->Rol_id == 1)
	      <li><a class="dropdown-toggle" data-toggle="dropdown" href="#">Administración
	        <span class="caret"></span></a>
	        <ul class="dropdown-menu">
	          <li><a href="{{ url('admin/cervezas') }}">Cervezas</a></li>
	          <li><a href="{{ url('admin/packs') }}">Packs</a></li>
	        {{--<li><a href="{{ url('admin/reportes') }}">Reportes</a></li>--}}
	        </ul>
	      </li>
		@endif
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	    @if (Auth::guest())
	      <li><a href="{{ url('login') }}"><span class="glyphicon glyphicon-log-in"></span> Iniciar Sesión</a></li>
	      <li><a href="{{ url('register') }}"><span class="glyphicon glyphicon-user"></span> Registrarse</a></li>
	    @else
	    	<li><a href="{{ url('carrito') }}">Mi Carrito</a></li>
	        <li class="dropdown">
	            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->nombre }} <span class="caret"></span></a>
	            <ul class="dropdown-menu" role="menu">
	                <li><a href="{{url ('perfil', base64_encode(Auth::user()->id) )}}">Perfil</a></li>
	                <li><a href="{{url('logout')}}">Cerrar Sesión</a></li>
	            </ul>
	        </li>
	    @endif  
	    </ul>
	  </div>
	</nav
</header>

