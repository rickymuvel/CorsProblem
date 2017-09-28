<?php

namespace App\Http\Controllers;

use App\Modelos\Resultado;
use App\PaletaResultado;
use App\Pr_Justificacion;
use App\Pr_Resultado;
use App\Pr_TipoContacto;
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
            $datos = DB::select('call sp_getResultadosAnadidosXCarteraXGestion('. $request->input('id_categoria_gestion') .', '. $request->input('id_cartera') .')');
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["error_msj"=>$e->getMessage(),"mensaje"=>"Resultado duplicado para la cartera elegida","status"=>500, "code" => $e->getCode()], 500);
        }
    }


    // Esta función guarda las justificaciones basadas en la tabla pr_resultados y la tabla categoria_gestion
    public function setPrJustificaciones(Request $request){
        try {
//            var_dump($request->justificaciones);exit;

            foreach ($request->justificaciones as $valor){

                $PRjus = new Pr_Justificacion();
                $PRjus->id_pr_resultado = $request->input('id_pr_resultado');
                $PRjus->id_categoria_gestion = $request->input('id_categoria_gestion');
                $PRjus->id_justificacion = $valor["id_justificacion"];
                $PRjus->id_cartera = $request->input('id_cartera');
                $reg = DB::table('pr_justificaciones')
                                ->where('id_pr_resultado','=', $request->input('id_pr_resultado'))
                                ->where('id_categoria_gestion','=', $request->input('id_categoria_gestion'))
                                ->where('id_justificacion','=', $valor["id_justificacion"])
                                ->where('id_cartera','=',$request->input('id_cartera'))
                                ->get();
                if(count($reg)==0){
                    $PRjus->save();
                }
            }
            $datos = DB::select('call sp_getJustificacionesAnadidasXCarteraXGestion('.
                $request->input('id_categoria_gestion') .','.
                $request->input('id_cartera') .','.
                $request->input('id_pr_resultado') .')');
//            echo $request->input('id_categoria_gestion') .','.$request->input('id_cartera') .','.$request->input('id_pr_resultado');exit;
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["error_msj"=>$e->getMessage(),"mensaje"=>"Resultado duplicado para la cartera elegida","status"=>500, "code" => $e->getCode()], 500);
        }
    }

    public function setPrTipoContacto(Request $request){
        try {
            $registro = new PaletaResultado();
            $registro->id_proveedor = $request->input('id_proveedor');
            $registro->id_cartera = $request->input('id_cartera');
            $registro->id_categoria_gestion = $request->input('id_categoria_gestion');
            $registro->save();
            foreach ($request->tipo_contactos as $valor){
                $PRtip = new Pr_TipoContacto();
                $PRtip->id_paleta_resultado = $registro->id;
                $PRtip->id_cartera = $request->input('id_cartera');
                $PRtip->id_tipo_contacto = $valor["id"];
                $reg = DB::table('pr_tipo_contacto')
                    ->where('id_cartera','=',$request->input('id_cartera'))
                    ->where('id_tipo_contacto','=', $valor["id"])
                    ->get();
                if(count($reg)==0){
                    $PRtip->save();
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
//            DB::table('pr_resultados')
//                ->where('id_cartera','=',$request->input('id_cartera'))
//                ->where('id_resultado','=', $request->input("id_resultado"))
//                ->delete();
//            Resultado::where([['id_cartera', $request->input('id_cartera')], ['id_resultado', $request->input('id_resultado')]])->update([
//                'estado' => "inactivo"
//            ]);

            Pr_Resultado::where('id_cartera', $request->input('id_cartera'))
                ->where('id_resultado', $request->input('id_resultado'))
                ->update(['estado' => "inactivo"]);

            $editado = true;
            return response()->json(["delete"=>$editado, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["delete"=>false, "error_msj"=>$e->getMessage(),"mensaje"=>"Resultado duplicado para la cartera elegida","status"=>500, "code" => $e->getCode()], 500);
        }
    }

    public function deletePrJustificaciones(Request $request){
        try {
            Pr_Justificacion::where('id', $request->input('id_justificacion'))
                ->update(['estado' => "inactivo"]);
            return response()->json(["delete"=>true, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["delete"=>false, "error_msj"=>$e->getMessage(),"mensaje"=>"Resultado duplicado para la cartera elegida","status"=>500, "code" => $e->getCode()], 500);
        }
    }

    public function Clonar(Request $request){
        $paleta = new PaletaResultado();
        $paleta->id_proveedor = $request->input('id_proveedor_destino');
        $paleta->id_cartera = $request->input('id_cartera_destino');
        $paleta->id_categoria_gestion = $request->input('id_categoria_gestion_destino');
        $paleta->save();
        // resultados
        foreach ($request->input("resultados_destino") as $valor){
            $pr_resultados = new Pr_Resultado();
            $pr_resultados->id_paleta_resultado = $paleta->id;
            $pr_resultados->id_resultado = $valor["id"];
            $pr_resultados->id_cartera = $paleta->id_cartera;
            $pr_resultados->save();
        }

        // justificaciones
        foreach ($request->input("justificaciones_destino") as $valor){
            $pr_justificacion = new Pr_Justificacion();
            $pr_justificacion->id_paleta_resultado = $paleta->id;
            $pr_justificacion->id_justificacion = $valor["id"];
            $pr_justificacion->id_cartera = $paleta->id_cartera;
            $pr_justificacion->save();
        }

        // tipos contacto
        foreach ($request->input("tipo_contactos_destino") as $valor){
            $pr_tipo_contacto = new Pr_TipoContacto();
            $pr_tipo_contacto->id_paleta_resultado = $paleta->id;
            $pr_tipo_contacto->id_tipo_contacto = $valor["id"];
            $pr_tipo_contacto->id_cartera = $paleta->id_cartera;
            $pr_tipo_contacto->save();
        }
        return response()->json(["exito"=>true, "status"=>true], 201);
    }

    public function deletePrTipoContacto(Request $request){
        try {
            DB::table('pr_tipo_contacto')
                ->where('id_cartera','=',$request->input('id_cartera'))
                ->where('id_tipo_contacto','=', $request->input("id_tipo_contacto"))
                ->delete();
            return response()->json(["delete"=>true, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["delete"=>false, "error_msj"=>$e->getMessage(),"mensaje"=>"Resultado duplicado para la cartera elegida","status"=>500, "code" => $e->getCode()], 500);
        }
    }

    public function getResultadosAnadidos(Request $request){
        try {
            $datos = DB::select('call sp_getResultadosAnadidosXCarteraXGestion('. $request->input('id_categoria_gestion') .', '. $request->input('id_cartera') .')');
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }

    public function getJustificacionesAnadidos(Request $request){
        try {
            $datos = DB::select('call sp_getJustificacionesAnadidasXCarteraXGestion('. $request->input('id_categoria_gestion') .', '. $request->input('id_cartera') .', '. $request->input('id_pr_resultado') .')');
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }

    public function getTipoContactoAnadidos(Request $request){
        try {
            $datos = DB::select('call sp_getTipoContactoAnadidasXCarteraXGestion('. $request->input('id_categoria_gestion') .', '. $request->input('id_cartera') .')');
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
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
