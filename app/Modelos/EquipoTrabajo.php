<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EquipoTrabajo extends Model
{
    use SoftDeletes;
    protected $table = "equipos_trabajo";
}
