<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUbicacionAgrupacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubicacion_agrupacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ubicacion_id')->unsigned()->nullable();
            $table->integer('agrupacion_id')->unsigned()->nullable();
            $table->foreign('ubicacion_id')->references('id')->on('ubicacion')->onDelete('cascade');
            $table->foreign('agrupacion_id')->references('id')->on('agrupacion')->onDelete('cascade');
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
        Schema::dropIfExists('ubicacion_agrupacion');
    }
}
