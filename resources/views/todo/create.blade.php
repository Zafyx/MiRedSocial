@extends('layouts.master')

@section('content')

    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Añadir Atuendos
                </div>
                <div class="card-body" style="padding:30px">

                    <form class="form-group" action="{{ url('/inicio/create/') }}" method="POST" enctype="multipart/form-data"> <!--TODO esto está bien redirigido? -->

                        @csrf

                        <!-- <h2> ¿Cuántos atuendos vas a subir?</h2>
                        <div class="">
                          <span id="boton1"> <button type="button" name="button"> 1 </button> </span>
                          <span id="boton2"> <button type="button" name="button"> 2 </button> </span>
                          <span id="boton3"> <button type="button" name="button"> 3 </button> </span>
                        </div> -->

                        <div class="form-group">
                            <label for="title"> Evento: </label>
                            <input type="text" name="tituloevento" id="tituloevento" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="title"> Describe tu evento: </label>
                            <input type="text" name="descripcionevento" id="descripcionevento" class="form-control">
                        </div>

                          <label for="image1"> Puedes subir desde 2 hasta 4 Atuendos: </label>

                        <div class="form-group">
                          <label for="image1"> Primer atuendo: </label>
                          <input type="file" class="form-control-file" name="file1">
                        </div>
                        <div class="form-group">
                          <label for="image2"> Segundo atuendo: </label>
                          <input type="file" class="form-control-file" name="file2">
                        </div>
                        <div class="form-group">
                          <label for="image3"> Tercer atuendo: </label>
                          <input type="file" class="form-control-file" name="file3">
                        </div>
                        <div class="form-group">
                          <label for="image4"> Cuarto atuendo: </label>
                          <input type="file" class="form-control-file" name="file4">
                        </div>

                        <!-- <div class="form-group" id="imagen">
                            <label for="image"> Puedes subir desde 2 hasta 4 Atuendos: </label>
                            <input type="file" class="form-control-file" name="files[]" multiple>
                        </div> -->

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
