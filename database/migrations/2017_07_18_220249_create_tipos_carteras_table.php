<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiposCarterasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_cartera', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_cartera')->unique();
            $table->timestamps();
            $table->string('estado', 8)->default("activo");
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipos_cartera');
    }
}