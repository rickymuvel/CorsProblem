<?php

namespace App\Http\Controllers;

use App\Modelos\TipoContacto;
use Illuminate\Http\Request;

class TipoContactoController extends Controller
{
    public function get(){
        try {
            $datos = TipoContacto::all();
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch (\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "status"=>false], 500);
        }
    }

    public function set(Request $request){
        try {
            $registro = new TipoContacto();
            $registro->tipo_contacto = $request->input('tipo_contacto');
            $registro->save();
            $datos = TipoContacto::all();
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["error_msj"=>$e->getMessage(), "status"=>false, "code" => $e->getCode()], 201);
        }
    }

    public function update(Request $request){
        try {
            TipoContacto::where('id', $request->input('id'))->update([
                'tipo_contacto' => $request->input("tipo_contacto")
            ]);
            $datos = TipoContacto::all();
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch (\Exception $e){
            return response()->json(["error_msj"=>$e->getMessage(), "status"=>false, "code" => $e->getCode()], 201);
        }

    }
}
