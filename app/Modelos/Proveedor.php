<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    use SoftDeletes;
    protected $table = "proveedores";
    protected $hidden = ['created_at', 'updated_at', 'estado'];
}
