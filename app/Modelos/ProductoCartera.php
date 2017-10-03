<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductoCartera extends Model
{
    use SoftDeletes;
    protected $table = "producto_cartera";

    public function proveedor(){
        return $this->belongsTo('App\Proveedor', 'id_proveedor');
    }

    public function producto(){
        return $this->belongsTo('App\Producto', 'id_producto');
    }

    public function cartera(){
        return $this->belongsTo('App\Cartera', 'id_cartera');
    }
}
