<?php

namespace App\Http\Controllers;

use App\TiposProducto;
use Illuminate\Http\Request;

class TipoProductoController extends Controller
{
    public function getTipoProducto(){
        try {
            $datos = TiposProducto::all();
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch (\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "status"=>false], 500);
        }
    }

    public function setTipoProducto(Request $request){
        try {
            $registro = new TiposProducto();
            $registro->tipo_producto = $request->input('tipo_producto');
            $registro->save();
            $datos = TiposProducto::all();
            return response()->json(["Tipo_Productos"=>$datos, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["error_msj"=>$e->getMessage(), "status"=>false, "code" => $e->getCode()], 201);
        }
    }

    public function updateTipoProducto(Request $request){
        try {
            TiposProducto::where('id', $request->input('id'))->update([
                'tipo_producto' => $request->input("tipo_producto")
            ]);
            $datos = TiposProducto::all();
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch (\Exception $e){
            return response()->json(["error_msj"=>$e->getMessage(), "status"=>false, "code" => $e->getCode()], 201);
        }

    }
}
