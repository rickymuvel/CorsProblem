<?php

namespace App\Http\Controllers;

use App\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use JWTAuth;

class PerfilController extends Controller
{
    public function set(Request $request)
    {
        $user = new Perfil();
        $user->perfil = $request->input('perfil');
        $user->save();
        $perfiles = DB::table('perfiles')->orderBy('id', 'desc')
            ->limit(1)
            ->get();

        return response()->json(['data'=> $perfiles],201);
    }

    public function get()
    {
       $perfiles = Perfil::all();
       return response()->json(['data'=>$perfiles], 201);
    }
}
