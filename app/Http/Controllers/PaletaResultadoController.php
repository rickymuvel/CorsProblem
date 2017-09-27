<?php

namespace App\Http\Controllers;

use App\PaletaResultado;
use App\Pr_Resultado;
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

    public function setPrResultados(Request $request){
        try {
            $registro = new PaletaResultado();
            $registro->id_proveedor = $request->input('id_proveedor');
            $registro->id_cartera = $request->input('id_cartera');
            $registro->id_categoria_gestion = $request->input('id_categoria_gestion');
            $registro->save();
            foreach ($request->resultados as $valor){
                $PRes = new Pr_Resultado();
                $PRes->id_paleta_resultado = $registro->id;
                $PRes->id_cartera = $request->input('id_cartera');
                $PRes->id_resultado = $valor["id"];
                $reg = DB::table('pr_resultados')
                                ->where('id_cartera','=',$request->input('id_cartera'))
                                ->where('id_resultado','=', $valor["id"])
                                ->get();
                if(count($reg)==0){
                    $PRes->save();
                }
            }
            $datos = DB::select('call sp_getPaletaResultados()');
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["error_msj"=>$e->getMessage(),"mensaje"=>"Resultado duplicado para la cartera elegida","status"=>500, "code" => $e->getCode()], 500);
        }
    }

    public function deletePrResultados(Request $request){
        try {
            DB::table('pr_resultados')
                ->where('id_cartera','=',$request->input('id_cartera'))
                ->where('id_resultado','=', $request->input("id_resultado"))
                ->delete();
            return response()->json(["delete"=>true, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["delete"=>false, "error_msj"=>$e->getMessage(),"mensaje"=>"Resultado duplicado para la cartera elegida","status"=>500, "code" => $e->getCode()], 500);
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
