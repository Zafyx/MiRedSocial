@extends('layouts.master')

@section('content')

    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Añadir Atuendos
                </div>
                <div class="card-body" style="padding:30px">

                    <form action="{{ url('/inicio/create/') }}" method="POST">

                        @csrf

                        <h2> ¿Cuántos atuendos vas a subir?</h2>
                        <div class="">
                          <span id="boton1"> <button type="button" name="button"> 1 </button> </span>
                          <span id="boton2"> <button type="button" name="button"> 2 </button> </span>
                          <span id="boton3"> <button type="button" name="button"> 3 </button> </span>
                        </div>

                        <div class="form-group">
                            <label for="title"> Evento: </label>
                            <input type="text" name="tituloevento" id="tituloevento" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="title"> Describe tu evento: </label>
                            <input type="text" name="descripcionevento" id="descripcionevento" class="form-control">
                        </div>

                        <div class="form-group" id="imagen1">
                            <label for="image">Atuendo</label>
                            <input type="file" class="form-control-file" name="image" id="image">
                        </div>
                        <div class="form-group" id="imagen2">
                            <label for="image">Atuendo</label>
                            <input type="file" class="form-control-file" name="image" id="image">
                        </div>
                        <div class="form-group" id="imagen3">
                            <label for="image">Atuendo</label>
                            <input type="file" class="form-control-file" name="image" id="image">
                        </div>
                        <div class="form-group" id="imagen4">
                            <label for="image">Atuendo</label>
                            <input type="file" class="form-control-file" name="image" id="image">
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary upload" style="padding:8px 100px;margin-top:25px;">
                                Añadir Atuendos
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>


@stop
