<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrTipoContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pr_tipo_contacto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pr_resultado')->unsigned();
            $table->foreign('id_pr_resultado')->references('id')->on('pr_resultados');
            $table->integer('id_categoria_gestion')->unsigned();
            $table->foreign('id_categoria_gestion')->references('id')->on('categoria_gestion');
            $table->integer('id_tipo_contacto')->unsigned();
            $table->foreign('id_tipo_contacto')->references('id')->on('tipos_contacto');
            $table->integer('id_cartera')->unsigned();
            $table->foreign('id_cartera')->references('id')->on('carteras');
            $table->timestamps();
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
        Schema::dropIfExists('pr_tipo_contacto');
    }
}
