<?php

namespace App\Http\Controllers;

use App\Modelos\CategoriaGestion;
use Illuminate\Http\Request;

class GestionesController extends Controller
{
    public function getCategorias(){
        try {
            $datos = CategoriaGestion::all();
            return response()->json(["datos" => $datos, "status"=> true], 201);
        }catch (\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }
}
