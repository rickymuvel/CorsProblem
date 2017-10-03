<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resultado extends Model
{
    use SoftDeletes;

    public function tipo_resultado(){
        return $this->belongsTo('App\TipoResultados', 'id_tipo_resultado');
    }
}
