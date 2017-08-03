<?php

namespace App\Http\Controllers;

use App\EquipoTrabajoCartera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipoTrabajoCarteraController extends Controller
{
    public function get(){
        try {
            $datos = DB::select('call sp_getEqTrabajoCartera()');
            return response()->json(["datos" => $datos, "status"=> true], 201);
        }catch(\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }
    public function set(Request $request){
        try {
            $registro = new EquipoTrabajoCartera();
            $registro->id_proveedor = $request->input('id_proveedor');
            $registro->id_cartera = $request->input('id_cartera');
            $registro->id_perfil = $request->input('id_perfil');
            $registro->id_equipo = $request->input('id_equipo');
            $registro->id_usuario = $request->input('id_usuario');
            $registro->id_segmento = $request->input('id_segmento');

            $registro->save();

            $datos = DB::select('call sp_getEqTrabajoCartera()');
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["datos"=>$e->getMessage(), "status"=>false], 201);
        }
    }
    public function update(Request $request){
        try {
            EquipoTrabajoCartera::where('id', $request->input('id'))->update([
                'id_proveedor' => $request->input('id_proveedor'),
                'id_cartera' => $request->input('id_cartera'),
                'id_perfil' => $request->input('id_perfil'),
                'id_equipo' => $request->input('id_equipo'),
                'id_usuario' => $request->input('id_usuario'),
                'id_segmento' => $request->input('id_segmento')
            ]);

            $listado = DB::select('call sp_getEqTrabajoCartera()');

            return response()->json(["datos"=>$listado, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }
}
