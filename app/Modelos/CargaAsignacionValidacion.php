<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CargaAsignacionValidacion extends Model
{
    use SoftDeletes;
    protected $table = "carga_asignacion_validaciones";
}
