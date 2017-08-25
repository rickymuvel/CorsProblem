<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

class LoginController extends Controller
{
    public function auth(Request $request)
    {
        $this->validate($request, [
            'user' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('user', 'password');
        try {
            if(!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'error' => "credenciales inválidas"
                ], 401);
            }
        } catch (JWTException $e){
            return response()->json([
                'error' => 'No se ha podido crear el token'
            ], 500);
        }

        // Obtenemos la información del usuario
        $user = User::where('user', $request->input('user'))
                    ->get();

        $perfil = $user->toArray();
        $id_perfil = $perfil[0]["id_perfil"];

        // buscamos el menú del usuario
        $menu = DB::select('call sp_getMenu('. $id_perfil .')');

        return response()->json(['token' => $token, 'user'=>$user->toArray(), 'menu' => $menu ], 200);

    }
}
