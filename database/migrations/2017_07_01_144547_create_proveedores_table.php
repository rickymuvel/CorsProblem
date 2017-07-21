<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('razon_social')->unique();
            $table->string('ruc')->unique();
            $table->string('rubro');
            $table->string('telefono1');
            $table->string('telefono2')->nullable();
            $table->string('telefono3')->nullable();
            $table->string('representante');
            $table->string('contacto');
            $table->string('telf_contacto');
            $table->string('estado')->default('activo');
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
        Schema::dropIfExists('proveedores');
    }
}
