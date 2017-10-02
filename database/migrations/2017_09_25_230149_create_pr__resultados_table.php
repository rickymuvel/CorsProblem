<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrResultadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pr_resultados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_paleta_resultado')->unsigned();
            $table->integer('id_resultado')->unsigned();
            $table->unique(['id_cartera', 'id_resultado']);
            $table->integer('id_cartera')->unsigned();
            $table->foreign('id_cartera')->references('id')->on('carteras');
            $table->foreign('id_resultado')->references('id')->on('resultados');
            $table->foreign('id_paleta_resultado')->references('id')->on('paleta_resultados');
            $table->timestamps();
            $table->softDeletes();
            $table->string('estado')->default('activo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pr_resultados');
    }
}
