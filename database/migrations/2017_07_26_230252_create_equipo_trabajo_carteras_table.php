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
            $table->foreign('id_cartera')->references('id')->on('carteras');
            $table->foreign('id_perfil')->references('id')->on('perfiles');
            $table->foreign('id_equipo')->references('id')->on('equipos_trabajo');
            $table->foreign('id_segmento')->references('id')->on('segmentos');
            $table->timestamps();
            $table->string('estado', 8)->default("activo");
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
