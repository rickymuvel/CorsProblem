<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoContactoResultadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_contacto_resultados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_resultado')->unsigned();
            $table->integer('id_tipo_contacto')->unsigned();
            $table->foreign('id_tipo_contacto')->references('id')->on('tipos_contacto');
            $table->foreign('id_resultado')->references('id')->on('resultados');
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
        Schema::dropIfExists('tipo_contacto_resultados');
    }
}
