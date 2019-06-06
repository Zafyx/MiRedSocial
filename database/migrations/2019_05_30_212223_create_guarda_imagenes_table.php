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
            $table->string('image');
            $table->timestamps();
        });

        Schema::table('imagenes', function($table) {
          $table->foreign('conjuntos_id')->references('id')->on('conjuntos');
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
