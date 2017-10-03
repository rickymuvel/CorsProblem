<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Segmento extends Model
{
    use SoftDeletes;

    public function cartera(){
        return $this->belongsTo('App\Cartera', 'id_cartera');
    }
}
