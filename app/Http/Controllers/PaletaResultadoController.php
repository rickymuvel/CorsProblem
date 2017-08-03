<?php

namespace App\Http\Controllers;

use App\PaletaResultado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaletaResultadoController extends Controller
{
    public function get(){
        try {
            $datos = DB::select('call sp_getPaletaResultados()');
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }
    public function set(Request $request){
        try {
            $registro = new PaletaResultado();
            $registro->id_proveedor = $request->input('id_proveedor');
            $registro->id_cartera = $request->input('id_cartera');
            $registro->id_resultado = $request->input('id_resultado');
            $registro->id_justificacion = $request->input('id_justificacion');
            $registro->save();
            $listado = DB::select('call sp_getPaletaResultados()');
            return response()->json(["datos"=>$listado, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["error_msj"=>$e->getMessage(), "status"=>false, "code" => $e->getCode()], 201);
        }
    }
    public function update(Request $request){
        try {
            PaletaResultado::where('id', $request->input('id'))->update([
                'id_proveedor' => $request->input("id_proveedor"),
                'id_cartera' => $request->input("id_cartera"),
                'id_resultado' => $request->input("id_resultado"),
                'id_justificacion' => $request->input("id_justificacion")
            ]);
            $listado = DB::select('call sp_getPaletaResultados()');
            return response()->json(["datos"=>$listado, "status"=>true], 201);
        }catch (\Exception $e){
            return response()->json(["error_msj"=>$e->getMessage(), "status"=>false, "code" => $e->getCode()], 201);
        }
    }
}
