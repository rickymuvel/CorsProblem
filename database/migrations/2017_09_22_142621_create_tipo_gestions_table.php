<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoGestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_gestion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_categoria_gestion')->unsigned();
            $table->foreign('id_categoria_gestion')->references('id')->on('categoria_gestion');
            $table->string('tipo_gestion');
            $table->string('estado')->default('activo');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_gestion');
    }
}
