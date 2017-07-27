<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string("dni")->unique();
            $table->string("ap_paterno");
            $table->string("ap_materno");
            $table->string("nombres");
            $table->date("fecnac");
            $table->string("est_civil");
            $table->date("fec_ingreso");
            $table->string("movil");
            $table->string("fijo");
            $table->string("direccion");
            $table->char("idubigeo",10);
            $table->string("email_corp")->unique();
            $table->string("email_per")->unique();
            $table->string("login")->unique();
            $table->string("contacto_emergencia");
            $table->string("telef_contacto");
            $table->integer("id_perfil")->unsigned();
            $table->foreign('id_perfil')->references('id')->on('perfiles');
            $table->string("turno");
            $table->rememberToken();
            $table->timestamps();
            $table->tinyInteger('estado')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
