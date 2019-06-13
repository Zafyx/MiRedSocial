<?php use App\Http\Controllers\TodoController; ?>
@extends('layouts.master')

@section('content')

    <div class="container" style="text-align:center; margin:auto;">

      <div class="row my-5" style="justify-content:center;">
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="row">
              <div class="col-sm-6 col-md-4">
                  <img class="imagenPerfil" src="/images/profilePhoto.png" alt="Foto Perfil" class="img-rounded img-responsive" />
              </div>
              <div class="col-sm-6 col-md-8">
                @foreach($usuario as $user)
                  <h2><?php echo $user->name; ?></h2>
                  <h3><?php echo $user->user_name; ?></h3>
                  <h3><?php echo $user->email; ?></h3>
                @endforeach
                <?php $existeseguidor = false; ?>
                @foreach( $seguidores as $seguidor )
                <?php if($seguidor->users_id_seguido == $id) {
                  $existeseguidor = true;
                } ?>
                @endforeach
                <?php if($existeseguidor) {$clase = "btn btn-info";
                  $texto = "Dejar de seguir"; } else {$clase = "btn btn-secondary";
                  $texto = "Seguir";}?>

                <?php if((auth()->user()->id) != $id) { ?>
                <form action="{{ url('seguir/' . $id ) }}" method="POST">
                  @csrf
                  <input class="btn btn-outline-info" type="submit" class="{{$clase}}" value="{{$texto}}" />
                </form>
                <?php } ?>
              </div>
          </div>
        </div>
      </div>



       @foreach( $conjuntos as $conjunto )
       <div class="card my-3" style="display:flex; align-items:center; padding-top:2%;">
         <div class="row" style="margin:auto; padding:auto;">
           <div class="card-body">
             <h5> Evento: {{$conjunto->event}}</h5>
             <h5> Descripción: {{$conjunto->description}}</h5>
           </div>
         </div>
       <div class="row pb-3" style="justify-content:center;">
       @foreach( $imagenes as $imagen )
       <?php if($conjunto->id == $imagen->conjuntos_id){ ?>
         <div class="card mx-2">
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
      @endforeach


  </div>
@stop
