<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perfil extends Model
{
    use SoftDeletes;
    protected $table = "perfiles";

    // Un perfil lo pueden tener muchos usuarios.
    public function usuarios(){
        // Definimos que un Perfil puede ser usado por muchos usuarios. Además decimos que la relación se hace
        // por el foreign key id_perfil de la tabla users.
        return $this->hasMany('App\User', 'id_perfil');
    }


}
