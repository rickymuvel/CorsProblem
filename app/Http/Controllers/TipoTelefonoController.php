<?php

namespace App\Http\Controllers;

use App\Modelos\TipoTelefono;
use Illuminate\Http\Request;

class TipoTelefonoController extends Controller
{
    public function get(){
        try {
            $datos = TipoTelefono::all();
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch (\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "status"=>false], 500);
        }
    }

    public function set(Request $request){
        try {
            $registro = new TipoTelefono();
            $registro->tipo_telefono = $request->input('tipo_telefono');
            $registro->save();
            $datos = TipoTelefono::all();
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["error_msj"=>$e->getMessage(), "status"=>false, "code" => $e->getCode()], 201);
        }
    }

    public function update(Request $request){
        try {
            TipoTelefono::where('id', $request->input('id'))->update([
                'tipo_telefono' => $request->input("tipo_telefono")
            ]);
            $datos = TipoTelefono::all();
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch (\Exception $e){
            return response()->json(["error_msj"=>$e->getMessage(), "status"=>false, "code" => $e->getCode()], 201);
        }

    }
}
