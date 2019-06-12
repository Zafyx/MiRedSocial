@extends('layouts.master')

@section('content')

    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Registrarse
                </div>
                <div class="card-body" style="padding:30px">

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
                            <input type="text" name="password" id="password" class="form-control">
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
