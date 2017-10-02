<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuContenedorItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_contenedor_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_menu_contenedor')->unsigned();
            $table->foreign('id_menu_contenedor')->references('id')->on('menus_contenedor');
            $table->integer('id_menu_item')->unsigned();
            $table->foreign('id_menu_item')->references('id')->on('menu_items');
            $table->timestamps();
            $table->softDeletes();
            $table->string('estado', 8)->default('activo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_contenedor_items');
    }
}
