@extends('layouts.master')

@section('content')

<div class="row mt-4 moda py-4" style="justify-content:center">
      <h3 class="col-md-12 dentromoda"> <strong>¿Tienes dudas al elegir qué ponerte?</strong> </h3>
      <h3 class="col-md-12 dentromoda"> ¡Nosotros podemos ayudarte a decidir! </h3>
      <h3 class="col-md-12 dentromoda"> Además, también nos puedes ayudar con tus opiniones. </h3>
      <h3 class="col-md-12 dentromoda"> ¡Únete y vota! </h3>
</div>
    <div class="row pt-4">



        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Registrarse
                </div>
                <div class="card-body containerLogin" style="padding:30px">

                    <form class="form-group" action="{{ url('registrarse') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <label for="title"> Nombre: </label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="title"> Nombre Usuario: </label>
                            <input type="text" name="user_name" id="user_name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="title"> Email: </label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="title"> Contraseña: </label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary upload" style="padding:8px 100px;margin-top:25px;">
                                Registrarse
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

@stop
