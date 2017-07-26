<?php

namespace App\Http\Controllers;

use App\Modelos\Resultado;
use Illuminate\Http\Request;

class ResultadoController extends Controller
{
    public function get(){
        try {
            $datos = Resultado::all();
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch (\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "status"=>false], 201);
        }
    }

    public function set(Request $request){
        try {
            $registro = new Resultado();
            $registro->resultado = $request->input('resultado');
            $registro->id_tipo_resultado = $request->input('id_tipo_resultado');
            $registro->save();
            $datos = Resultado::all();
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["datos"=>$e->getMessage(), "status"=>false], 201);
        }
    }

    public function update(Request $request){
        try {
            Resultado::where('id', $request->input('id'))->update([
                'resultado' => $request->input("resultado"),
                'id_tipo_resultado' => $request->input("id_tipo_resultado")
            ]);
            $datos = Resultado::all();
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch (\Exception $e){
            return response()->json(["datos"=>$e->getMessage(), "status"=>false], 201);
        }
    }
}
