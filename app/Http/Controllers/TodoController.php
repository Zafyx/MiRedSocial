<?php

namespace WhatToWear\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function getIndex()
    {
        return view('todo.index');
    }

    public function getPerfilUsuario($id) //getShow
    {
        return view('todo.perfil');
    }

    public function getCreate()
    {
        return view('todo.create');
    }

    public function postCreate(Request $request) {
      //https://www.jose-aguilar.com/blog/como-subir-una-imagen-con-jquery-ajax-php/
        if (($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/png")
        || ($_FILES["file"]["type"] == "image/gif")) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], "images/".$_FILES['file']['name'])) {
            //more code here...
            echo "images/".$_FILES['file']['name'];
        } else {
            echo 0;
        }
      } else {
        echo 0;
      }
    }

    public function getEdit($id)
    {

        return view('todo.edit');
    }

    public function putEdit($id)
    {
        // $pelicula = Movie::findOrFail($id);
        // $pelicula->title = $request->title;
        // $pelicula->year = $request->year;
        // $pelicula->director = $request->director;
        // $pelicula->poster = $request->poster;
        // $pelicula->synopsis = $request->synopsis;
        //
        // $pelicula->save();
        return 'el put aún no va jaja';
    }


    // public function changeRented($id)
    // {
    //     $pelicula = Movie::findOrFail($id);
    //     $pelicula->rented = !$pelicula->rented;
    //     $pelicula->save();
    //     return back();
    // }

}
