<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiposProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_producto')->unique();
            $table->timestamps();
            $table->softDeletes();
            $table->string('estado', 8)->default("activo");
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipo_productos');
    }
}
