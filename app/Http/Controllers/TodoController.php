<?php

namespace WhatToWear\Http\Controllers;
use DB;
use WhatToWear\Conjunto;
use WhatToWear\Imagen;
use WhatToWear\Seguidor;
use WhatToWear\User;
use WhatToWear\Voto;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function getIndex()
    {
        $users = User::all();
        $conjuntos = DB::table('conjuntos')
                ->orderBy('created_at', 'desc')
                ->get();
        $imagenes = Imagen::all();
        $votos = Voto::all();
        $seguidores = Seguidor::all();
        
        return view('todo.index', compact('users','conjuntos','imagenes','votos','seguidores'));
    }

    public function getPerfilUsuario($id)
    {
      $userId = auth()->user()->id;
      $usuario = User::all()->where('id', $id);
      $conjuntos = DB::table('conjuntos')->where('users_id', $id)->orderBy('created_at','DESC')->get();
      $imagenes = Imagen::all()->where('users_id', $id);
      $votos = Voto::all();
      $seguidores = Seguidor::all()->where('users_id_seguidor', $userId);

      return view('todo.perfil', compact('conjuntos','imagenes','votos','seguidores','id','usuario'));
    }

    public function getCreate()
    {
        return view('todo.create');
    }

    public function postCreate(Request $request) {

      $userId = auth()->user()->id;
      $conjunto = new Conjunto();
      $conjunto->users_id = $userId;
      $conjunto->event = $request->input('tituloevento');
      $conjunto->description = $request->input('descripcionevento');
      $conjunto->save();

      if($request->hasFile('file1') && $request->hasFile('file2')) {

        $file1 = $request->file('file1');
        $name_image1 = time().$file1->getClientOriginalName();
        $file2 = $request->file('file2');
        $name_image2 = time().$file2->getClientOriginalName();

        $file1->move(public_path().'/images/',$name_image1);
        $file2->move(public_path().'/images/',$name_image2);

        $imagen1 = new Imagen();
        $imagen1->conjuntos_id = $conjunto->id;
        $imagen1->users_id = $userId;
        $imagen1->image = $name_image1;
        $imagen1->save();

        $imagen2 = new Imagen();
        $imagen2->conjuntos_id = $conjunto->id;
        $imagen2->users_id = $userId;
        $imagen2->image = $name_image2;
        $imagen2->save();

        if($request->hasFile('file3') != null) {
          $file3 = $request->file('file3');
          $name_image3 = time().$file3->getClientOriginalName();
          $file3->move(public_path().'/images/',$name_image3);

          $imagen3 = new Imagen();
          $imagen3->conjuntos_id = $conjunto->id;
          $imagen3->users_id = $userId;
          $imagen3->image = $name_image3;
          $imagen3->save();
        }
        if($request->hasFile('file4') != null) {
          $file4 = $request->file('file4');
          $name_image4 = time().$file4->getClientOriginalName();
          $file4->move(public_path().'/images/',$name_image4);

          $imagen4 = new Imagen();
          $imagen4->conjuntos_id = $conjunto->id;
          $imagen4->users_id = $userId;
          $imagen4->image = $name_image4;
          $imagen4->save();
        }

        return redirect()->action('TodoController@getPerfilUsuario', [$userId]);
      }
      echo 'Se tienen que seleccionar 2 fotos como mínimo.';
}

    public function getEdit($id)
    {
        return view('todo.edit');
    }
    public function postVotar($imagenes_id, $conjuntos_id)
    {
        $userId = auth()->user()->id;
        //Antes de dar el voto compruebo que no haya sido votada alguna
        //de las otras fotos del mismo conjunto.
        $imagenes_del_conjunto = Imagen::all()->where('conjuntos_id', $conjuntos_id);
        foreach ($imagenes_del_conjunto as $imagen) {
          $existe = DB::table('votos')->where('imagenes_id', $imagen->id)->where('users_id', $userId)->pluck('id');
          //Si existe una imagen de ese conjunto votada, borro el voto.
          if ($existe) {
              $estoquehace = DB::table('votos')->where('imagenes_id', $imagen->id)->where('users_id', $userId)->delete();
          }
        }
        //Ahora asigno el voto a la imagen en la que se ha clickado.
        $voto = new Voto();
        $voto->imagenes_id = $imagenes_id;
        $voto->users_id = auth()->user()->id;
        $voto->save();

        return back();
    }

    public function postSeguir($id)
    {
      $mi_usuario = auth()->user()->id;
      $existe_relacion = DB::table('seguidores')->where('users_id_seguidor', $mi_usuario)->where('users_id_seguido', $id)->count();
      if($existe_relacion > 0) {
        DB::table('seguidores')->where('users_id_seguidor', $mi_usuario)->where('users_id_seguido', $id)->delete();
      } else {
        $seguidor = new Seguidor();
        $seguidor->users_id_seguidor = $mi_usuario;
        $seguidor->users_id_seguido = $id;
        $seguidor->save();
      }

      return back();
    }

    public function buscarUser(Request $request) {
      $usuarioBuscado = $request->input('userBuscado');
      $miUser = DB::table('users')->where('user_name',$usuarioBuscado)->pluck('id');
      if (empty($miUser[0])) {
        return back();
      } else {
        $id = explode("[", $miUser);
        $id = explode("]", $id[1]);

        return redirect()->action('TodoController@getPerfilUsuario', $id[0]);
      }
    }

    public function getRegistrarse() {
      return view('todo.registrar');
    }

    public function postRegistrarse(Request $request) {
      $usuario = new User();
      $usuario->name = $request->input('name');
      $usuario->user_name = $request->input('user_name');
      $usuario->email = $request->input('email');
      $contrasena = bcrypt($request->input('password'));
      $usuario->password = $contrasena;
      $usuario->profile_photo = 'foto_por_defecto.jpg';
      $usuario->save();

      return redirect()->action('TodoController@getIndex');
    }
}
