<?php use App\Http\Controllers\TodoController; ?>
@extends('layouts.master')

@section('content')

    <div class="row" style="text-align: center">
      <div>
       @foreach( $conjuntos as $conjunto )
       <?php if((auth()->user()->id) != $conjunto->users_id) { ?>
         @foreach( $seguidores as $seguidor )
         <?php if($seguidor->users_id_seguido == $conjunto->users_id) { ?>
         <form action="{{ url('seguir/' . $conjunto->users_id ) }}" method="POST">
           @csrf
           <input type="submit" value="Seguir" />
         </form>
         <?php } ?>
         @endforeach
       <?php } ?>

       <div class="row">
       <div class="col-sm-8">
           <h4>{{$conjunto->event}}</h4>
           <h6>{{$conjunto->description}}</h6>
       </div>

       @foreach( $imagenes as $imagen )
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
      </div>
      @endforeach
      </div>
  </div>
@stop
