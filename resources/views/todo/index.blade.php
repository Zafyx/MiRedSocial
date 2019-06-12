@extends('layouts.master')

@section('content')

    <!-- <div class="row"> -->
            <!-- <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                <h1>Esto es el index!</h1>
            </div> -->
            <div class="container" style="text-align:center; margin:auto;">

                <?php if (Auth::check()){ ?>
                  <?php $usuarioAutenticado = auth()->user()->id; ?>

                @foreach($conjuntos as $conjunto)
                  @foreach($users as $user)
                    @foreach($seguidores as $seguidor)
                      <?php if (($conjunto->users_id == $user->id) && ($seguidor->users_id_seguidor == $usuarioAutenticado) && ($seguidor->users_id_seguido == $user->id)){ ?>
                        <div class="card my-3" style="display:flex; align-items:center; padding-top:2%;">
                          <div class="row" style="margin:auto; padding:auto;">
                            <div class="card-body">
                              <h5> Usuario: <a href="{{url('inicio/perfil/' . $user->id)}}"><?php echo $user->user_name; ?> <a></h4>
                              <h5> Evento: {{$conjunto->event}}</h4>
                              <h5> Descripción del evento: {{$conjunto->description}}</h4>
                            </div>
                          </div>
                          <div class="row pb-3" style="justify-content:center;">
                          @foreach($imagenes as $imagen)
                          <?php if($conjunto->id == $imagen->conjuntos_id){ ?>
                              <div class="card">
                                <div class="card-body">
                                  <span style="margin: auto;"><img class="card-img" src="/images/{{$imagen->image}}" alt="foto" style="height: 200px; width: 200px;"></span>
                                  <?php $votosImagen = 0; ?>
                                  @foreach( $votos as $voto )
                                  <?php if($imagen->id == $voto->imagenes_id){ $votosImagen++; }?>
                                  @endforeach
                                  <h5 style="padding-top: 3%"> Votos: <?php echo $votosImagen ?> </h5>
                                  <?php $votosImagen = 0; ?>
                                  <form action="{{ url('votar/' . $imagen->id .'/' . $imagen->conjuntos_id) }}" method="POST">
                                    @csrf
                                    <input class="btn btn-outline-dark" type="submit" value="Votar" />
                                  </form>
                                </div>
                              </div>
                          <?php } ?>
                          @endforeach
                          </div>
                          </div>
                        <?php } ?>
                        @endforeach
                      @endforeach
                    @endforeach

            <?php } else { ?>

            @foreach($conjuntos as $conjunto)
            <?php $nombreUsuario = ''; ?>
            <div class="col-sm-8">
              @foreach($users as $user)
              <?php if ($conjunto->users_id == $user->id) { $nombreUsuario = $user->user_name; $fotoUsuario = $user->profile_photo; } ?>
                <h4> Usuario: <a href="{{url('inicio/perfil/' . $user->id)}}"><?php echo $nombreUsuario ?> <a></h4>

                  <h4> Evento: {{$conjunto->event}}</h4>
                  <h6> Descripción del evento: {{$conjunto->description}}</h6>
              </div>
            <?php $nombreUsuario = ''; $fotoUsuario = ''; ?>
              @foreach($imagenes as $imagen)
              <?php if($conjunto->id == $imagen->conjuntos_id){ ?>
                <div class="col-sm-4 mx-4">
                    <img src="/images/{{$imagen->image}}" alt="foto" style="height: 200px; width: 200px;">
                    <?php $votosImagen = 0; ?>
                    @foreach( $votos as $voto )
                    <?php if($imagen->id == $voto->imagenes_id){ $votosImagen++; }?>
                     <!-- Aquí pongo los votos de la imagen -->
                     @endforeach
                    <p> Votos: <?php echo $votosImagen ?> </p>
                    <?php $votosImagen = 0; ?>
                    <form action="{{ url('votar/' . $imagen->id .'/' . $imagen->conjuntos_id) }}" method="POST">
                      @csrf
                      <input type="submit" value="Votar" />
                    </form>
                </div>
              <?php } ?>
              @endforeach
              @endforeach
            @endforeach

          <?php } ?>

      </div>

    <!-- </div> -->

@stop
