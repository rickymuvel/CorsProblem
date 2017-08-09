<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('menu');
            $table->integer('menu_id')->unsigned()->default0(1);
            $table->integer('nivel')->default(1);
            $table->string('icono')->nullable();
            $table->string('url')->nullable();
            $table->foreign('menu_id')->references('id')->on('menus');
            $table->timestamps();
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
        Schema::dropIfExists('menus');
    }
}
