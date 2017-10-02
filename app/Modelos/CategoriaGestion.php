<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriaGestion extends Model
{
    use SoftDeletes;
    protected $table = "categoria_gestion";
}
