<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSegmentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('segmentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('id_cartera')->unsigned();
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
        Schema::dropIfExists('segmentos');
    }
}
