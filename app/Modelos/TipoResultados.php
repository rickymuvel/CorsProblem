<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoResultados extends Model
{
    use SoftDeletes;

    public function resultado(){
        return $this->hasMany('App\Resultado', 'id_tipo_resultado');
    }
}
