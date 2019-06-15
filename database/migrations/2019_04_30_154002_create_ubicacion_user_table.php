<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUbicacionUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('ubicacion_user', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ubicacion_id')->unsigned()->nullable();
          $table->integer('user_id')->unsigned();
          $table->foreign('ubicacion_id')->references('id')->on('ubicacion')->onDelete('cascade');
          $table->foreign('user_id')->references('id')->on('users');
          $table->timestamps();
          $table->softDeletes();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ubicacion_user');
    }
}
