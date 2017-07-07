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
            $table->string("ubigeo");
            $table->string("email_corp");
            $table->string("email_per");
            $table->string("login");
            $table->string("contacto_emergencia");
            $table->string("telef_contacto");
            $table->string("perfil");
            $table->string("turno");
            $table->rememberToken();
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
        Schema::dropIfExists('usuarios');
    }
}
