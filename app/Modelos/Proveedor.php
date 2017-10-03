<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    use SoftDeletes;
    protected $table = "proveedores";
    protected $hidden = ['created_at', 'updated_at', 'estado'];

    public function rubro(){
        return $this->belongsTo('App\Rubro', 'id_rubro');
    }

    public function carteras(){
        return $this->hasMany('App\Carteras', 'id_proveedor');
    }

    public function producto_cartera(){
        return $this->hasMany('App\ProductoCartera', "id_proveedor");
    }

    public function producto_proveedor(){
        return $this->hasMany('App\ProductoProveedor', 'id_proveedor');
    }
}
