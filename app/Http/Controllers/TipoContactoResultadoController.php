<?php

namespace App\Http\Controllers;

use App\TipoContactoResultado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoContactoResultadoController extends Controller
{
    public function get(){
        try {
            $listado = DB::select('call sp_getTipoContactoResultado()');
            return response()->json(["datos"=>$listado, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }
    public function set(Request $request){
        try {
            $registro = new TipoContactoResultado();
            $registro->id_resultado = $request->input('id_resultado');
            $registro->id_tipo_contacto = $request->input('id_tipo_contacto');
            $registro->save();
            $listado = DB::select('call sp_getTipoContactoResultado()');
            return response()->json(["datos"=>$listado, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["error_msj"=>$e->getMessage(), "status"=>false, "code" => $e->getCode()], 201);
        }
    }
    public function update(Request $request){
        try {
            TipoContactoResultado::where('id', $request->input('id'))->update([
                'id_resultado' => $request->input("id_resultado"),
                'id_tipo_contacto' => $request->input("id_tipo_contacto")
            ]);
            $listado = DB::select('call sp_getTipoContactoResultado()');
            return response()->json(["datos"=>$listado, "status"=>true], 201);
        }catch (\Exception $e){
            return response()->json(["error_msj"=>$e->getMessage(), "status"=>false, "code" => $e->getCode()], 201);
        }
    }
}
