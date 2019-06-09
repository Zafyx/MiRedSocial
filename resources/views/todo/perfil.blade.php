<?php use App\Http\Controllers\TodoController; ?>
@extends('layouts.master')

@section('content')

    <div class="row" style="text-align: center">
      <div>
       @foreach( $conjuntos as $conjunto )
       <div class="col-sm-8">
           <h4>{{$conjunto->event}}</h4>
           <h6>{{$conjunto->description}}</h6>
       </div>
       <div class="row">
       @foreach( $imagenes as $imagen )
       <?php if($conjunto->id == $imagen->conjuntos_id){ ?>
         <div class="col-sm-4 mx-4">
             <img onclick="{{route('votar', ['conjuntos_id' => $conjunto->id, 'imagenes_id' => $imagen->id])}}" src="/images/{{$imagen->image}}" alt="foto" style="height: 200px; width: 200px;">
         </div>
      <?php } ?>
      @endforeach
      </div>
      @endforeach
      </div>
  </div>

@stop
