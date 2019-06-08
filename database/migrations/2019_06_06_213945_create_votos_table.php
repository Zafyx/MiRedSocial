<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('votos', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('imagenes_id')->unsigned();
          $table->foreign('imagenes_id')->references('id')->on('imagenes')->onDelete('cascade');
          $table->bigInteger('users_id')->unsigned();
          $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votos');
    }
}
