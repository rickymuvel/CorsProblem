<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property array|string justificacion
 */
class Justificacion extends Model
{
    use SoftDeletes;
    protected $table = 'justificaciones';
}
