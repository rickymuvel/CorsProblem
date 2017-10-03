<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductoProveedor extends Model
{
    use SoftDeletes;
    protected $table = "producto_proveedores";

    public function producto(){
        return $this->belongsTo('App\Producto', 'id_producto');
    }

    public function proveedor(){
        return $this->belongsTo('App\Proveedor', 'id_proveedor');
    }

}
