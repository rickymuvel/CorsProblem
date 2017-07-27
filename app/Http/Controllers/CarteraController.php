<?php

namespace App\Http\Controllers;

use App\Cartera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarteraController extends Controller
{
    public function get(){
        try {
            $listado = DB::select('call sp_getCarteras()');
            return response()->json(["datos"=>$listado, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }

    public function set(Request $request){
        try {
            $cartera = new Cartera();
            $cartera->id_proveedor = $request->input('id_proveedor');
            $cartera->id_tipo_cartera = $request->input('id_tipo_cartera');
            $cartera->cartera = $request->input('cartera');
            $cartera->save();
            $listado = DB::select('call sp_getCarteras()');
            return response()->json(["datos"=>$listado, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }

    public function update(Request $request){
        try {
            Cartera::where('id', $request->input('id'))->update([
            'id_proveedor' => $request->input('id_proveedor'),
            'id_tipo_cartera' => $request->input('id_tipo_cartera'),
            'cartera' => $request->input('cartera')
            ]);

            $listado = DB::select('call sp_getCarteras()');

            return response()->json(["datos"=>$listado, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }
}