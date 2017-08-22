<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuContenedorsTable extends Migration
{
    public function up()
    {
        Schema::create('menus_contenedor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_perfil_menu_contenedor')->unsigned();
            $table->foreign('id_perfil_menu_contenedor')->references('id')->on('perfil_menu_contenedores');
            $table->string('nombre');
            $table->string('imagen')->nullable();
            $table->integer('nivel')->unsigned();
            $table->integer('id_menu_contenedor')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('menus_contenedor');
    }
}
