@extends('layouts.master')

@section('content')

    <!-- <div class="row"> -->

            <div class="col-xs-6 col-sm-4 col-md-3 text-center">

                <h1>Esto es el index!</h1>
            </div>
            <div class="row" style="text-align: center">
              <div class="row">

            @foreach($conjuntos as $conjunto)
            <?php $nombreUsuario = ''; ?>
            <div class="col-sm-8">
              @foreach($users as $user)
              <?php if ($conjunto->users_id == $user->id) { $nombreUsuario = $user->user_name; $fotoUsuario = $user->profile_photo; } ?>
                <h4> Usuario: <a href="{{url('inicio/perfil/' . $user->id)}}"><?php echo $nombreUsuario ?> <a></h4>
                  @endforeach
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
          </div>
      </div>

    <!-- </div> -->

@stop
