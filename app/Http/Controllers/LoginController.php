<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
//use Tymon\JWTAuth\JWTAuth;
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
            JWTAuth::factory()->setTTL(null);
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

        return response()->json(['token' => $token ], 200);
    }
}
