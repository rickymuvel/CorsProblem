<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductoProveedor extends Model
{
    use SoftDeletes;
    protected $table = "producto_proveedores";
}
