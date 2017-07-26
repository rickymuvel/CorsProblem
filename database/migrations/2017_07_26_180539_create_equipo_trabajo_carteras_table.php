<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipoTrabajoCarterasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipo_trabajo_cartera', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_proveedor')->unsigned();
            $table->integer('id_cartera')->unsigned();
            $table->integer('id_perfil')->unsigned();
            $table->integer('id_equipo')->unsigned();
            $table->integer('id_segmento')->unsigned();

            $table->foreign('id_proveedor')->references('id')->on('proveedores');
            $table->integer('id_cartera')->references('id')->on('carteras');
            $table->integer('id_perfil')->references('id')->on('perfiles');
            $table->integer('id_equipo')->references('id')->on('equipos');
            $table->integer('id_segmento')->references('id')->on('segmentos');
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
        Schema::dropIfExists('equipo_trabajo_cartera');
    }
}
