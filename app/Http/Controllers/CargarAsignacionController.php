<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CargarAsignacionController extends Controller
{
    public function get(){
        try {
//            $listado = DB::select('call sp_getSegmentos()');
//            return response()->json([ "datos" => $listado, "status" => true], 201);
        }catch(\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false ], 201);
        }
    }

    public function set(Request $request){
        try {
            if($request->file('archivo')->getMimeType()=="text/plain"){
                $path = $request->file('archivo')->store('archivos');
                return response()->json(["datos"=>$path, "status" => true], 201);
            }
//            return response()->json([ "datos" => $path, "status" => true], 201);
//            return $path;
//            return response()->json(["respuesta" => $request->input("archivo")]);
//            $obj = new Segmento();
//            $obj->nombre = $request->input('nombre');
//            $obj->id_cartera = $request->input('id_cartera');
//            $obj->save();
//            $listado = DB::select('call sp_getSegmentos()');
//            return response()->json([ "datos" => $request->all(), "status" => true], 201);
        }catch(\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }
    public function update(Request $request){
        try {
//            Rubro::where('id', $request->input('id'))->update([
//                'nombre' => $request->input("nombre"),
//                'id_cartera' => $request->input("id_cartera")
//            ]);
//            $listado = DB::select('call sp_getSegmentos()');
//            return response()->json([ "datos" => $listado, "status" => true], 201);
        }catch (\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }
}
