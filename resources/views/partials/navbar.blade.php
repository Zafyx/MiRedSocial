<nav class="navbar navbar-expand-lg navbar-light default-color sticky-top">
  <a class="navbar-brand" href="/">What To Wear</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <form class="form-inline justify-content-center" action="{{ url('/buscarUser') }}" method="POST">
          @csrf
          <input class="form-control mr-sm-2" type="text" name="userBuscado" placeholder="Buscar Usuario" aria-label="Search">
          <button class="btn btn-outline-dark upload my-2 my-sm-0" type="submit"> Buscar </button>
        </form>
      </li>
      </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="/inicio/crearConjunto"> Añadir Conjunto </a>
      </li>
      <li class="nav-item">
        <?php if (Auth::check()) { ?>
        <a class="nav-link" href="{{url('inicio/perfil/' . auth()->user()->id)}}"> Mi Perfil </a>
        <?php }?>
      </li>
        <?php if (Auth::check()) { ?>
        <li class="nav-item">
          <a class="nav-link" href="/inicio/logout"> Cerrar Sesión </a>
        </li>
      <?php } else {?>
          <li><a class="nav-link" href="/login"> Iniciar Sesión </a></li>
          <li><a class="nav-link" href="/registrarse"> Registrarse </a></li>
        <?php }?>
    </ul>
  </div>
</nav>
