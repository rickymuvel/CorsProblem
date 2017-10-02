<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoContacto extends Model
{
    use SoftDeletes;
    protected $table = "tipos_contacto";
}
