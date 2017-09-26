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
            $table->integer('id_paleta_resultado')->unsigned();
            $table->integer('id_tipo_contacto')->unsigned();
            $table->foreign('id_tipo_contacto')->references('id')->on('tipos_contacto');
            $table->foreign('id_paleta_resultado')->references('id')->on('paleta_resultados');
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
