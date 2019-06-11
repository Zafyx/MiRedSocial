<?php use App\Http\Controllers\TodoController; ?>
@extends('layouts.master')

@section('content')

    <div class="row" style="text-align: center">
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
        <input type="submit" class="{{$clase}}" value="{{$texto}}" />
      </form>
      <?php } ?>
      <div>
       @foreach( $conjuntos as $conjunto )
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
