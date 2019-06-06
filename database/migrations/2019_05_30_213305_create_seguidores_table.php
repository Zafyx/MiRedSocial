<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeguidoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguidores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('users_id_seguidor')->unsigned();
            $table->foreign('users_id_seguidor')->references('id')->on('users');
            $table->integer('users_id_seguido')->unsigned();
            $table->foreign('users_id_seguido')->references('id')->on('users');
            $table->primary(['users_id_seguidor', 'users_id_seguido']);
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
        Schema::dropIfExists('seguidores');
    }
}
