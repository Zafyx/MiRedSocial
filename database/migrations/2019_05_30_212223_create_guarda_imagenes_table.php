<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuardaImagenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagenes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('conjuntos_id')->unsigned();
            $table->bigInteger('users_id')->unsigned();
            $table->string('image');
            $table->timestamps();
        });

        Schema::table('imagenes', function($table) {
          $table->foreign('conjuntos_id')->references('id')->on('conjuntos');
          $table->foreign('users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagenes');
    }
}
