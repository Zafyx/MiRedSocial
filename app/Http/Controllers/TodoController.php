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
        return view('todo.index', compact('users','conjuntos','imagenes','votos'));
    }

    public function getPerfilUsuario($id)
    {
      //$arrayAtuendos[] = array();
      $conjuntos = Conjunto::all()->where('users_id', $id);
      $imagenes = Imagen::all()->where('users_id', $id);
      $votos = Voto::all();

      return view('todo.perfil', compact('conjuntos','imagenes','votos'));
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
        //return view('todo.perfil', compact('userId'));
        //return redirect('inicio/perfil/{id}')->with(compact('userId'));
        //return redirect()->route('inicio.perfil.{id}')->with('id', $userdId);
      }

      echo 'Se tienen que seleccionar 2 fotos como mínimo.';

    //   session_start();
    //
    //   //$user = $_SESSION['name'];
    //   //https://www.codexworld.com/upload-multiple-images-store-in-database-php-mysql/
    //   if(isset($_POST['submit'])){
    // // File upload configuration
    // $targetDir = "/fotos";
    // $allowTypes = array('jpg','png','jpeg','gif');
    //
    // $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    // $file1 = $file2 = $file3 = $file4 = '';
    // if(!empty(array_filter($_FILES['files']['name'])) && $_FILES['files']['name'] <= 4){
    //     foreach($_FILES['files']['name'] as $key=>$val){
    //         // File upload path
    //         $fileName = basename($_FILES['files']['name'][$key]);
    //         $file1 = basename($_FILES['files']['name'][0]);
    //         $file2 = basename($_FILES['files']['name'][1]);
    //         $file3 = basename($_FILES['files']['name'][2]);
    //         $file4 = basename($_FILES['files']['name'][3]);
    //         $targetFilePath = $targetDir . $fileName;
    //
    //         // Check whether file type is valid
    //         $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    //         if(in_array($fileType, $allowTypes)){
    //             // Upload file to server
    //             if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
    //                 // Image db insert sql
    //                 $insertValuesSQL .= "('".$fileName."', NOW()),";
    //             }else{
    //                 $errorUpload .= $_FILES['files']['name'][$key].', ';
    //             }
    //         }else{
    //             $errorUploadType .= $_FILES['files']['name'][$key].', ';
    //         }
    //     }
    //
    //     if(!empty($insertValuesSQL)){
    //         $insertValuesSQL = trim($insertValuesSQL,',');
    //         // Insert image file name into database   //TODO modifidicar esto
    //         $insert = $db->query("INSERT INTO imagenes (user_name, image1, image2, image3, image4) VALUES ('".auth()->user()->user_name."','".$file1."','".$file2."','".$file3."','".$file4."')");
    //         if($insert){
    //             $errorUpload = !empty($errorUpload)?'Upload Error: '.$errorUpload:'';
    //             $errorUploadType = !empty($errorUploadType)?'File Type Error: '.$errorUploadType:'';
    //             $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType;
    //             $statusMsg = "Files are uploaded successfully.".$errorMsg;
    //         }else{
    //             $statusMsg = "Sorry, there was an error uploading your file.";
    //         }
    //     }
    // }else{
    //     $statusMsg = 'Please select a file to upload.';
    // }
    //
    // // Display status message
    // $conjunto = new Conjunto();
    // $conjunto->event = $request->input('tituloevento');
    // $conjunto->description = $request->input('descripcionevento');
    // $conjunto->image1 = $file1;
    // $conjunto->image2 = $file2;
    // $conjunto->image3 = $file3;
    // $conjunto->image4 = $file4;
    // $conjunto->save();
    // echo $statusMsg;
    // session_close();
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
              $estoquehace = DB::table('votos')->where('imagenes_id', '=', $imagen->id)->delete();
          }
        }
        //Ahora asigno el voto a la imagen en la que se ha clickado.
        $voto = new Voto();
        $voto->imagenes_id = $imagenes_id;
        $voto->users_id = auth()->user()->id;
        $voto->save();

        return back();
    }

    public function putEdit($id)
    {

        return 'el put aún no va jaja';
    }

    public function followUser($id){
        $user = User::find($id);
        if(!$user){
            return redirect()->back()->with('error', 'User does not exist.');
            }

            $follow = new Follower;
            $follow->follower_id = Auth::user()->id;
            $follow->leader_id = $user;

            $follow->save();
            return redirect()->back()->with('success', 'You now follow the user!');

    }


    // public function changeRented($id)
    // {
    //     $pelicula = Movie::findOrFail($id);
    //     $pelicula->rented = !$pelicula->rented;
    //     $pelicula->save();
    //     return back();
    // }

}
