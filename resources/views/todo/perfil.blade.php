@extends('layouts.master')

@section('content')

    <div class="row">

        <div class="col-sm-4">

            <a href="{{ $conjunto->id }}">
                <img src="{{$conjunto->image1}}" style="height:200px"/>
            </a>

        </div>
        <div class="col-sm-8">

            <h4>{{$conjunto->event}}</h4>
            <h6>A&ntilde;o: {{$conjunto->description}}</h6>

        </div>
    </div>
    <?php
    // Include the database configuration file
    include_once 'dbConfig.php';

    // Get images from the database
    $query = $db->query("SELECT * FROM images ORDER BY id DESC");

    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            $imageURL = 'uploads/'.$row["file_name"];
    ?>
        <img src="<?php echo $imageURL; ?>" alt="" />
    <?php }
    }else{ ?>
        <p>No image(s) found...</p>
    <?php } ?>

@stop
