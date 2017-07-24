<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    public function getProductos(){
        try {
            $datos = DB::select('call sp_getProductos()');
            return response()->json(["datos" => $datos, "status"=> true], 201);
        }catch (\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }

    }

    public function setProducto(Request $request){
        try {
            $prod = new Producto();
            $prod->producto = $request->input('producto');
            $prod->id_tipo_producto = $request->input('id_tipo_producto');
            $prod->save();
            $datos = DB::select('call sp_getProductos()');
            return response()->json(["datos" => $datos, "status"=> true], 201);
        }catch (Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }

    public function updateProducto(Request $request){

    }
}
