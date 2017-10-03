<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;

    public function tipo_producto(){
        return $this->belongsTo('App\TiposProducto', 'id_tipo_producto');
    }

    public function producto_cartera(){
        return $this->hasMany('App\ProductoCartera', "id_producto");
    }

    public function producto_proveedor(){
        return $this->hasMany('App\ProductoProveedor', 'id_producto');
    }
}
