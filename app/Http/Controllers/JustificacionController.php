<?php

namespace App\Http\Controllers;

use App\Justificacion;
use Illuminate\Http\Request;

class JustificacionController extends Controller
{
    public function get(){
        try {
            $datos = Justificacion::all();
            return response()->json(["datos" => $datos, "status"=> true], 201);
        }catch (\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }

    public function set(Request $request){
        try {
            $obj = new Justificacion();
            $obj->justificacion = $request->input('justificacion');
            $obj->save();
            $datos = Justificacion::all();
            return response()->json(["datos" => $datos, "status"=> true], 201);
        }catch(\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }
    public function update(Request $request){
        try {
            Justificacion::where('id', $request->input('id'))->update([
                'justificacion' => $request->input("justificacion")
            ]);
            $datos = Justificacion::all();
            return response()->json(["datos" => $datos, "status"=> true], 201);
        }catch (\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }
}
