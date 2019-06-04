<?php

namespace WhatToWear\Http\Controllers;

use WhatToWear\Conjunto;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function getIndex()
    {
        $conjuntos = Conjunto::all();
        return view('todo.index', compact('conjuntos'));
    }

    public function getPerfilUsuario($id) //getShow
    {
      $usuario = auth()->user()->user_name;

      $sentencia = DB::select('SELECT image1 FROM conjuntos WHERE user_name = ?', [$usuario]);

      return view('todo.perfil', compact('sentencia'));
    }

    public function getCreate()
    {
        return view('todo.create');
    }

    public function postCreate(Request $request) {

      $existe3 = $existe4 = false;

      if($request->hasFile('file1') && $request->hasFile('file2')) {

        $file1 = $request->file('file1');
        $name_image1 = time().$file1->getClientOriginalName();
        $file2 = $request->file('file2');
        $name_image2 = time().$file2->getClientOriginalName();

        $file1->move(public_path().'/images/',$name_image1);
        $file2->move(public_path().'/images/',$name_image2);

        if($request->hasFile('file3') != null) {
          $file3 = $request->file('file3');
          $name_image3 = time().$file3->getClientOriginalName();
          $file3->move(public_path().'/images/',$name_image3);
        }
        if($request->hasFile('file4') != null) {
          $file4 = $request->file('file4');
          $name_image4 = time().$file4->getClientOriginalName();
          $file4->move(public_path().'/images/',$name_image4);
        }
        $usuario = auth()->user()->user_name;
        $conjunto = new Conjunto();
        $conjunto->user_name = $usuario;
        $conjunto->event = $request->input('tituloevento');
        $conjunto->description = $request->input('descripcionevento');
        $conjunto->image1 = $name_image1;
        $conjunto->image2 = $name_image2;
        if ($existe3) {
          $conjunto->image3 = $name_image3;
        } else {
          $conjunto->image3 = null;
        }
        if ($existe4) {
          $conjunto->image4 = $name_image4;
        } else {
          $conjunto->image4 = null;
        }
        $conjunto->save();
        return view('todo.perfil');
        //$db->query("INSERT INTO imagenes (user_name, image1, image2, image3, image4) VALUES ('".auth()->user()->user_name."','".$file1."','".$file2."','".$file3."','".$file4."')");
      }
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
