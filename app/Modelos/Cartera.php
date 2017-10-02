<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cartera extends Model
{
    use SoftDeletes;

    public function proveedor(){
        return $this->belongsTo('App\Proveedor', 'id_proveedor');
    }

    public function tipo_cartera(){
        return $this->belongsTo('App\TiposCartera', 'id_tipo_cartera');
    }
}
