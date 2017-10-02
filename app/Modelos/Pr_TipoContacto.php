<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pr_TipoContacto extends Model
{
    use SoftDeletes;
    protected $table = "pr_tipo_contacto";
}
