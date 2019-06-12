@extends('layouts.master')

@section('content')

    <!-- <div class="row"> -->
            <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                <h1>Esto es el index!</h1>
            </div>
            <div class="container" style="text-align:center; margin:auto;">

                <?php if (Auth::check()){ ?>
                  <?php $usuarioAutenticado = auth()->user()->id; ?>

                @foreach($conjuntos as $conjunto)
                <div class="card">
                  @foreach($users as $user)
                    @foreach($seguidores as $seguidor)
                    <?php if (($conjunto->users_id == $user->id) && ($seguidor->users_id_seguidor == $usuarioAutenticado) && ($seguidor->users_id_seguido == $user->id)){ ?>
                      <div class="card-body">
                        <h4> Usuario: <a href="{{url('inicio/perfil/' . $user->id)}}"><?php echo $user->user_name; ?> <a></h4>
                        <h4> Evento: {{$conjunto->event}}</h4>
                        <h4> Descripción del evento: {{$conjunto->description}}</h4>
                      </div>
                      <div class="row" style="margin:auto; padding:auto;">
                        <table border="0" cellpadding="2">
                          <tr>
                      @foreach($imagenes as $imagen)
                      <td>
                      <?php if($conjunto->id == $imagen->conjuntos_id){ ?>
                            <img class="card-img-top" src="/images/{{$imagen->image}}" alt="foto" style="height: 200px; width: 200px;">
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
                      <?php } ?>
                      </td>
                      @endforeach
                    </tr>
                  </table>
                    </div>
                    <?php } ?>
                    @endforeach
                  @endforeach
                  </div>
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
