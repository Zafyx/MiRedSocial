@extends('layouts.master')

@section('content')
<p>hola</p>
  <p>hola</p>
    <p>hola</p>
      <p>hola</p>
        <p>hola</p>
    <div class="row">

       @foreach( $arrayAtuendos as $conjunto )
      <div>
        <div class="col-sm-4">
                <!-- <img src="images/{{$sentencia}}" style="height:200px"/> -->
        </div>
        <div class="col-sm-8">
            <h4>{{$conjunto->event}}</h4>
            <h6>{{$conjunto->description}}</h6>
        </div>
      </div>
      @endforeach
      <p>hola</p>
  </div>

@stop
