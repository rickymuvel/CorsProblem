<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoGestion extends Model
{
    use SoftDeletes;
    protected  $table = "tipo_gestion";
}
