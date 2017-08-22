<?php

namespace App\Http\Controllers;

use App\Modelos\Segmento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SegmentoController extends Controller
{
    public function get(){
        try {
            $listado = DB::select('call sp_getSegmentos()');
            return response()->json([ "datos" => $listado, "status" => true], 201);
        }catch(\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }

    public function getSegmentosxCartera($id_cartera){
        try {
            $datos= Segmento::where('id_cartera', $id_cartera)->get();
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }

    public function set(Request $request){
        try {
            $obj = new Segmento();
            $obj->nombre = $request->input('nombre');
            $obj->id_cartera = $request->input('id_cartera');
            $obj->save();
            $listado = DB::select('call sp_getSegmentos()');
            return response()->json([ "datos" => $listado, "status" => true], 201);
        }catch(\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }
    public function update(Request $request){
        try {
            Rubro::where('id', $request->input('id'))->update([
                'nombre' => $request->input("nombre"),
                'id_cartera' => $request->input("id_cartera")
            ]);
            $listado = DB::select('call sp_getSegmentos()');
            return response()->json([ "datos" => $listado, "status" => true], 201);
        }catch (\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }
}
