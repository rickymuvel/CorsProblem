<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaletaResultadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paleta_resultados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_proveedor')->unsigned();
            $table->integer('id_cartera')->unsigned();
            $table->integer('id_categoria_gestion')->unsigned();
            $table->foreign('id_proveedor')->references('id')->on('proveedores');
            $table->foreign('id_cartera')->references('id')->on('carteras');
            $table->foreign('id_categoria_gestion')->references('id')->on('categoria_gestion');
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
        Schema::dropIfExists('paleta_resultados');
    }
}
