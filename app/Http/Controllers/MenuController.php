<?php

namespace App\Http\Controllers;

use App\Modelos\MenuContenedor;
use App\Modelos\MenuItem;
use App\Modelos\PerfilMenuContenedor;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function create_perfil_menu_contenedor(Request $request){
        try {
            $registro = new PerfilMenuContenedor();
            $registro->id_perfil = $request->input('id_perfil');
            $registro->nombre = $request->input('nombre');
            $registro->save();

            $datos = PerfilMenuContenedor::all();
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["datos"=>$e->getMessage(), "status"=>false], 201);
        }
    }

    public function create_menu_contenedor(Request $request){
        try {
            $registro = new MenuContenedor();
            $registro->id_perfil_menu_contenedor = $request->input('id_perfil_menu_contenedor');
            $registro->nombre = $request->input('nombre');
            $registro->imagen = $request->input('imagen');
            $registro->nivel = $request->input('nivel');
            $registro->id_menu_contenedor = $request->input('id_menu_contenedor');
            $registro->save();

            $datos = MenuContenedor::all();
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["datos"=>$e->getMessage(), "status"=>false], 201);
        }
    }
//admin/tablas-apoyo/perfil

    public function create_menu_item(Request $request){
        try {
            $registro = new MenuItem();
            $registro->nombre = $request->input('nombre');
            $registro->url = $request->input('url');
            $registro->imagen = $request->input('imagen');
            $registro->save();

            $datos = MenuItem::all();
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["datos"=>$e->getMessage(), "status"=>false], 201);
        }
    }

    public function create_menu_contenedor_items(Request $request){
        try {
            $registro = new MenuItem();
            $registro->id_menu_contenedor = $request->input('url');
            $registro->id_menu_item = $request->input('imagen');
            $registro->save();

            $datos = MenuItem::all();
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["datos"=>$e->getMessage(), "status"=>false], 201);
        }
    }
}
