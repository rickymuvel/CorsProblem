<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EquipoTrabajoCartera extends Model
{
    use SoftDeletes;
    protected $table = "equipo_trabajo_cartera";
}
