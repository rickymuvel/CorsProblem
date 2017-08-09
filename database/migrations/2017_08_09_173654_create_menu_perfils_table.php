<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuPerfilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus_perfil', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_perfil')->unsigned();
            $table->integer('id_menu')->unsigned();
            $table->foreign('id_perfil')->references('id')->on('perfiles');
            $table->foreign('id_menu')->references('id')->on('menus');
            $table->string('estado', 8)->default("activo");
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
        Schema::dropIfExists('menus_perfil');
    }
}
