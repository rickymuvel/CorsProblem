<?php

namespace App\Http\Controllers;

use App\Modelos\TiposCartera;
use Illuminate\Http\Request;

class TipoCarteraController extends Controller
{
    public function get(){
        try {
            $datos = TiposCartera::all();
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch (\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "status"=>false], 201);
        }
    }

    public function set(Request $request){
        try {
            $registro = new TiposCartera();
            $registro->tipo_cartera = $request->input('tipo_cartera');
            $registro->save();
            $datos = TiposCartera::all();
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["datos"=>$e->getMessage(), "status"=>false], 201);
        }
    }

    public function update(Request $request){
        try {
            TiposCartera::where('id', $request->input('id'))->update([
                    'tipo_cartera' => $request->input("tipo_cartera")
            ]);
            $datos = TiposCartera::all();
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch (\Exception $e){
            return response()->json(["datos"=>$e->getMessage(), "status"=>false], 201);
        }
    }
}
