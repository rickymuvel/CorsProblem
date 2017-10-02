<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuContenedorItem extends Model
{
    use SoftDeletes;
    protected $table = "menu_contenedor_items";
}
