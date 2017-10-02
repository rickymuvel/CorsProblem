<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuContenedor extends Model
{
    use SoftDeletes;
    protected $table = "menus_contenedor";
}
