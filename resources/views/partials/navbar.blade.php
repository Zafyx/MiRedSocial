<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" href="/" style="color:#777"><span style="font-size:15pt">&#9820;</span> What To Wear</a>


        @if( true || Auth::check() )
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{  Request::is('catalog/create') ? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/catalog/create')}}">
                            <span> Añadir Atuendos </span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('catalog') && ! Request::is('catalog/create')? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/catalog')}}">
                            <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                            Mi Perfil
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav navbar-right">
                    <li class="nav-item">
                        <form action="{{ url('/logout') }}" method="POST" style="display:inline">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer">
                                Cerrar sesión
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</nav> -->

<style media="screen">
  .navbar {
    background-color: #c1bdfa !important;
  }
</style>

<nav class="navbar navbar-expand-lg navbar-light default-color sticky-top">
  <a class="navbar-brand" href="/">What To Wear</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav mx-auto">
      <li class="nav-item">
        <form class="form-inline justify-content-center">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
        </form>
      </li>
      </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="/inicio/crearConjunto"> Añadir Conjunto </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/inicio/perfil/"> Mi Perfil </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/inicio/logout"> Cerrar Sesión </a>
      </li>
    </ul>
  </div>
</nav>
