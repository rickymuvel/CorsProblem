<?php

namespace App\Http\Controllers;

use App\TipoDireccion;
use Illuminate\Http\Request;

class TipoDireccionController extends Controller
{
    public function get(){
        try {
            $datos = TipoDireccion::all();
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch (\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "status"=>false], 500);
        }
    }

    public function set(Request $request){
        try {
            $registro = new TipoDireccion();
            $registro->tipo_direccion = $request->input('tipo_direccion');
            $registro->save();
            $datos = TipoDireccion::all();
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["error_msj"=>$e->getMessage(), "status"=>false, "code" => $e->getCode()], 201);
        }
    }

    public function update(Request $request){
        try {
            TipoDireccion::where('id', $request->input('id'))->update([
                'tipo_direccion' => $request->input("tipo_direccion")
            ]);
            $datos = TipoDireccion::all();
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch (\Exception $e){
            return response()->json(["error_msj"=>$e->getMessage(), "status"=>false, "code" => $e->getCode()], 201);
        }

    }
}
