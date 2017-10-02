<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoDireccion extends Model
{
    use SoftDeletes;
    protected $table = "tipo_direcciones";
}
