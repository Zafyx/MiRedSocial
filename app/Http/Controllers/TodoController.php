<?php

namespace WhatToWear\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class TodoController extends Controller
{

    public function getIndex()
    {
        // $arrayPeliculas = Movie::all();
        // return view('catalog.index', array('arrayPeliculas'=> $arrayPeliculas));
        return view('todo.index');
    }

    public function getPerfilUsuario($id) //getShow
    {
        $pelicula = Movie::findOrFail($id);
        return view('catalog.show', array(
            'pelicula' => $pelicula
        ));
    }

    public function getCreate()
    {
        return 'Aquí aparecerá el formulario para crear un conjunto :)';
    }

    public function postCreate(Request $request) {
        Movie::create([
            'title' => $request->title,
            'year' => $request->year,
            'director' => $request->director,
            'poster' => $request->poster,
            'synopsis' => $request->synopsis
        ]);
        return redirect('/catalog');
    }

    public function getEdit($id)
    {
        $pelicula = Movie::findOrFail($id);
        return view('catalog.edit', array('pelicula'=>$pelicula));
    }

    public function putEdit($id)
    {
        $pelicula = Movie::findOrFail($id);
        $pelicula->title = $request->title;
        $pelicula->year = $request->year;
        $pelicula->director = $request->director;
        $pelicula->poster = $request->poster;
        $pelicula->synopsis = $request->synopsis;

        $pelicula->save();
        return redirect('/catalog/show/' . $pelicula->id);
    }


    public function changeRented($id)
    {
        $pelicula = Movie::findOrFail($id);
        $pelicula->rented = !$pelicula->rented;
        $pelicula->save();
        return back();
    }

}
