@extends('layouts.master')

@section('content')
<p>hola</p>
  <p>hola</p>
    <p>hola</p>
      <p>hola</p>
        <p>hola</p>

    <div class="row">

       @foreach( $conjuntos as $conjunto )

       <div class="col-sm-8">
           <h4>{{$conjunto->event}}</h4>
           <h6>{{$conjunto->description}}</h6>
       </div>

       @foreach( $imagenes as $imagen )
      <div>
        <div class="col-sm-4">

        </div>
        <div class="col-sm-8">
            <h4>{{$conjunto->event}}</h4>
            <h6>{{$conjunto->description}}</h6>
        </div>
      </div>
      @endforeach
      @endforeach
      <p>hola</p>
  </div>

@stop
