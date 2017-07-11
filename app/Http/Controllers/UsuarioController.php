<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function setUsuario(Request $request)
    {
        return response()->json(["usuarios"=>"asdfasdf"], 201);
    }

    public function getUsuarios(){
        $usuarios = Usuario::all();
        return response()->json(["usuarios"=>$usuarios], 201);
    }
}
