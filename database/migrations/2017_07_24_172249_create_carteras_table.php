<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarterasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carteras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_proveedor')->unsigned();
            $table->integer('id_tipo_cartera')->unsigned();
            $table->string('cartera');
            $table->foreign('id_proveedor')->references('id')->on('proveedores');
            $table->foreign('id_tipo_cartera')->references('id')->on('tipos_cartera');
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
        Schema::dropIfExists('carteras');
    }
}
