<?php

namespace App\Http\Controllers;

//use App\TipoContactoResultado;
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
    public function set(Request $request){}
    public function update(Request $request){}
}
