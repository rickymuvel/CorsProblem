<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedorCarteraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        # **********************
        // POSIBLEMENTE ESTA TABLA SERÁ ELIMINADA, NO SE ENCUENTRA SU UTILIZACIÓN.
        # **********************
        Schema::create('proveedor_cartera', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_proveedor')->unsigned();
            $table->integer('id_cartera')->unsigned();
            $table->foreign('id_proveedor')->references('id')->on('proveedores');
            $table->foreign('id_cartera')->references('id')->on('carteras');
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('proveedor_cartera');
    }
}
