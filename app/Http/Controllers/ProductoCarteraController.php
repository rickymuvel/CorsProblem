<?php

namespace App\Http\Controllers;

use App\ProductoCartera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoCarteraController extends Controller
{
    public function get(){
        try {
            $listado = DB::select('call sp_getProductoCartera()');
            return response()->json(["datos"=>$listado, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }
    public function set(Request $request){
        try {
            $registro = new ProductoCartera();
            $registro->id_proveedor = $request->input('id_proveedor');
            $registro->id_producto = $request->input('id_producto');
            $registro->id_cartera = $request->input('id_cartera');
            $registro->save();

            $datos = DB::select('call sp_getProductoCartera()');
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["datos"=>$e->getMessage(), "status"=>false], 201);
        }
    }
    public function update(Request $request){
        try {
            ProductoCartera::where('id', $request->input('id'))->update([
                'id_proveedor' => $request->input('id_proveedor'),
                'id_producto' => $request->input('id_producto'),
                'id_cartera' => $request->input('id_cartera')
            ]);

            $listado = DB::select('call sp_getProductoCartera()');

            return response()->json(["datos"=>$listado, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }
}
