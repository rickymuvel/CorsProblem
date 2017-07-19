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
            $table->string("nombre");
            $table->string('cartera');
            $table->integer('id_tipo_cartera')->unsigned();
            $table->foreign('id_tipo_cartera')->references('id')->on('tipos_cartera');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('carteras');
    }
}
