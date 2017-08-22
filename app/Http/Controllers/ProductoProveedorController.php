<?php

namespace App\Http\Controllers;

use App\Modelos\ProductoProveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoProveedorController extends Controller
{
    public function get(){
        try {
            $listado = DB::select('call sp_getProductoProveedor()');
            return response()->json(["datos"=>$listado, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }
    public function set(Request $request){
        try {
            $registro = new ProductoProveedor();
            $registro->id_producto = $request->input('id_producto');
            $registro->id_proveedor = $request->input('id_proveedor');
            $registro->save();
            $datos = DB::select('call sp_getProductoProveedor()');
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["datos"=>$e->getMessage(), "status"=>false], 201);
        }
    }
    public function update(Request $request){
        try {
            ProductoProveedor::where('id', $request->input('id'))->update([
                'id_producto' => $request->input('id_producto'),
                'id_proveedor' => $request->input('id_proveedor')
            ]);
            $listado = DB::select('call sp_getProductoProveedor()');
            return response()->json(["datos"=>$listado, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }
}
