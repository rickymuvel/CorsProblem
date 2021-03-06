<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TiposProducto extends Model
{
    use SoftDeletes;
    protected  $table = "tipo_productos";

    public function productos(){
        return $this->hasMany('App\Producto', 'id_tipo_producto');
    }
}
