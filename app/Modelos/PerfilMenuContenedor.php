<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PerfilMenuContenedor extends Model
{
    use SoftDeletes;
    protected $table = "perfil_menu_contenedores";
}
