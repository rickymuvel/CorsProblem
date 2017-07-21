<?php

namespace App\Http\Controllers;

use App\Modelos\TipoResultados;
use Illuminate\Http\Request;

class TiposResultadoController extends Controller
{
    public function getTiposResultado(){
        try {
            $datos = TipoResultados::all();
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch (\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "status"=>false], 500);
        }
    }

    public function setTiposResultado(Request $request){
        try {
            $registro = new TipoResultados();
            $registro->tipo_resultado = $request->input('tipo_resultado');
            $registro->peso = $request->input('peso');
            $registro->save();
            $datos = TipoResultados::all();
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["error_msj"=>$e->getMessage(), "status"=>false, "code" => $e->getCode()], 201);
        }
    }

    public function updateTiposResultado(Request $request){
        try {
            TipoResultados::where('id', $request->input('id'))->update([
                'tipo_resultado' => $request->input("tipo_resultado")
            ]);
            $datos = TipoResultados::all();
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch (\Exception $e){
            return response()->json(["error_msj"=>$e->getMessage(), "status"=>false, "code" => $e->getCode()], 201);
        }

    }
}
