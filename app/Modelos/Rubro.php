<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rubro extends Model
{
    use SoftDeletes;

    public function proveedores(){
        return $this->hasMany('App\Proveedor', 'id_rubro');
    }
}