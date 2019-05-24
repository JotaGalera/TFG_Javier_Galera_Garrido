<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDispositivoEspacioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispositivo_espacio', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('dispositivo_id')->unsigned()->nullable();
          $table->integer('espacio_id')->unsigned()->nullable();
          $table->foreign('dispositivo_id')->references('id')->on('dispositivo')->onDelete('cascade');
          $table->foreign('espacio_id')->references('id')->on('espacios')->onDelete('cascade');
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
        Schema::dropIfExists('dispositivo_espacio');
    }
}
