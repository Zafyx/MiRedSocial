@extends('layouts.master')

@section('content')

    <div class="row">

            <div class="col-xs-6 col-sm-4 col-md-3 text-center">

                <h1>Esto es el index!</h1>
            </div>

            @foreach($conjuntos as $conjunto)
              <p>{{$conjunto->event}}</p>
              <p>{{$conjunto->description}}</p>
            @endforeach

    </div>

@stop
