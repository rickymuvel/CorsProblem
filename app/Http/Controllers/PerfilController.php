<?php

namespace App\Http\Controllers;

use App\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerfilController extends Controller
{
    public function crearPerfil(Request $request)
    {
        $user = new Perfil();
        $user->perfil = $request->input('perfil');
        $user->estado = $request->input('estado');
        $user->save();
        $perfiles = DB::table('perfiles')->orderBy('id', 'desc')
            ->limit(1)
            ->get();

        return response()->json(['perfiles'=> $perfiles],201);
    }

    public function getPerfiles()
    {
       $perfiles = Perfil::all();
       return response()->json(['perfiles'=>$perfiles], 201);
    }
}
