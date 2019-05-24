<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticuloEspacioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo_espacio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('articulo_id')->unsigned()->nullable();
            $table->integer('espacio_id')->unsigned()->nullable();
            $table->foreign('articulo_id')->references('id')->on('articulo')->onDelete('cascade');
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
        Schema::dropIfExists('articulo_espacio');
    }
}
