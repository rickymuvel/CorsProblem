<?php

namespace App\Http\Controllers;

use App\Cartera;
use App\Modelos\Segmento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarteraController extends Controller
{
    public function get(){
        try {
            $listado = DB::select('call sp_getCarteras()');
            return response()->json(["datos"=>$listado, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }

    // Obtener segmentos de una determinada cartera.
    public function getSegmentos($id_cartera){
        try {
            $listado = Segmento::where('id_cartera', $id_cartera)->get();
            return response()->json(["datos"=>$listado, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }

    // Obtener segmentos de una determinada cartera.
    public function getCarterasxProveedor($id_proveedor){
        try {
            $listado = Cartera::where('id_proveedor', $id_proveedor)->get();
            return response()->json(["datos"=>$listado, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }

    public function set(Request $request){
        try {
            $cartera = new Cartera();
            $cartera->id_proveedor = $request->input('id_proveedor');
            $cartera->id_tipo_cartera = $request->input('id_tipo_cartera');
            $cartera->cartera = $request->input('cartera');
            $cartera->save();

            // creamos el segmento por default
            $segmento = new Segmento();
            $segmento->nombre = "default";
            $segmento->id_cartera = $cartera->id;
            $segmento->save();

            $listado = DB::select('call sp_getCarteras()');
            return response()->json(["datos"=>$listado, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }

    public function update(Request $request){
        try {
            Cartera::where('id', $request->input('id'))->update([
            'id_proveedor' => $request->input('id_proveedor'),
            'id_tipo_cartera' => $request->input('id_tipo_cartera'),
            'cartera' => $request->input('cartera')
            ]);

            $listado = DB::select('call sp_getCarteras()');

            return response()->json(["datos"=>$listado, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }
}
