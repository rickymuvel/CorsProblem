<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TiposCartera extends Model
{
    use SoftDeletes;
    protected $table = "tipos_cartera";
}
