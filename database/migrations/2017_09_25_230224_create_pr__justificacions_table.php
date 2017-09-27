<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrJustificacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pr_justificaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_paleta_resultado')->unsigned();
            $table->foreign('id_paleta_resultado')->references('id')->on('paleta_resultados');
            $table->integer('id_justificacion')->unsigned();
            $table->foreign('id_justificacion')->references('id')->on('justificaciones');
            $table->integer('id_cartera')->unsigned();
            $table->foreign('id_cartera')->references('id')->on('carteras');
            $table->timestamps();
            $table->string('estado')->default('activo');
            $table->unique(['id_cartera', 'id_justificacion']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pr_justificaciones');
    }
}
