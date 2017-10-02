<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function perfil(){
        // aquí decimos que un perfil le pertenece a un usuario o que Un usuario solo tiene un perfil.
        // además decimos que el usuario se relaciona con el perfil por su campo id_perfil el cual es foraneo.
        return $this->belongsTo('App\Perfil','id_perfil');
    }
}