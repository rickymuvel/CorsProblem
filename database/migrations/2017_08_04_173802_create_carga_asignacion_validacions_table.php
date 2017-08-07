<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCargaAsignacionValidacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carga_asignacion_validaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_asignacion');
            $table->string('estado', 9)->deafult('pendiente');//exitosa fallida pendiente
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
        Schema::dropIfExists('carga_asignacion_validacions');
    }
}
