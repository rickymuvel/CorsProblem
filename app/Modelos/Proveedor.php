<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = "proveedores";
    protected $hidden = ['created_at', 'updated_at', 'estado'];
}
