<?php

namespace App\Http\Controllers;

use App\EquipoTrabajo;
use Illuminate\Http\Request;

class EquipoTrabajoController extends Controller
{
    public function getEquiposTrabajos(){
        try {
            $datos = EquipoTrabajo::all();
            return response()->json(["datos" => $datos, "status"=> true], 201);
        }catch(\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }
    public function setEquipoTrabajo(Request $request){
        try {
            $obj = new EquipoTrabajo();
            $obj->equipo_trabajo = $request->input('equipo_trabajo');
            $obj->save();
            $datos = EquipoTrabajo::all();
            return response()->json(["datos" => $datos, "status"=> true], 201);
        }catch(\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }
    public function updateEquipoTrabajo(Request $request){
        try {
            EquipoTrabajo::where('id', $request->input('id'))->update([
                'equipo_trabajo' => $request->input("equipo_trabajo")
            ]);
            $datos = EquipoTrabajo::all();
            return response()->json(["datos" => $datos, "status"=> true], 201);
        }catch (\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }
}
