<?php

namespace App\Http\Controllers;

use App\Modelos\MenuContenedor;
use App\Modelos\MenuContenedorItem;
use App\Modelos\MenuItem;
use App\Modelos\PerfilMenuContenedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function create_perfil_menu_contenedor_base(Request $request){
        try {
            $registro = new PerfilMenuContenedor();
            $registro->id_perfil = $request->input('id_perfil');
            $registro->nombre = $request->input('nombre');
            $registro->save();

            $datos = DB::select('call sp_getMenuContenedorBase()');
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["datos"=>$e->getMessage(), "status"=>false], 201);
        }
    }

    public function get_perfil_menu_contenedor_base(){
        try {
            $datos = DB::select('call sp_getMenuContenedorBase()');
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["datos"=>$e->getMessage(), "status"=>false], 201);
        }
    }

    public function update_perfil_menu_contenedor_base(Request $request){
        try {
            PerfilMenuContenedor::where('id', $request->input('id'))->update([
                'id_perfil' => $request->input('id_perfil'),
                'nombre' => $request->input('nombre')
            ]);
            $listado = DB::select('call sp_getMenuContenedorBase()');
            return response()->json(["datos" => $listado, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["datos" => $e->getMessage(), "status"=>false], 201);
        }
    }

    public function create_menu_contenedor(Request $request){
        try {
            $registro = new MenuContenedor();
            $registro->id_perfil_menu_contenedor = $request->input('id_perfil_menu_contenedor');
            $registro->nombre = $request->input('nombre');
            $registro->imagen = $request->input('imagen');
            $registro->orden = $request->input('orden');
            $registro->nivel = $request->input('nivel');
            $registro->id_menu_contenedor = $request->input('id_menu_contenedor');
            $registro->save();

            $datos = DB::select('call sp_getMenuContenedor()');
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["datos"=>$e->getMessage(), "status"=>false], 201);
        }
    }

    public function get_contenedores(Request $request){
        $nivel = $request->input("nivel");
        if(isset($nivel) && is_numeric($nivel)){
            $registros = DB::select('call sp_getMenuContenedorXNivel('. $nivel .')');
        }else{
            $registros = DB::select('call sp_getMenuContenedor()');
        }
        return response()->json(["datos" => $registros], 201);
    }

    public function update_contenedores(Request $request){
        try {
            MenuContenedor::where('id', $request->input('id'))->update([
                'id_perfil_menu_contenedor' => $request->input('id_perfil_menu_contenedor'),
                'nombre' => $request->input('nombre'),
                'imagen' => $request->input('imagen'),
                'orden' => $request->input('orden'),
                'nivel' => $request->input('nivel'),
                'id_menu_contenedor' => $request->input('id_menu_contenedor'),
            ]);
            $listado = DB::select('call sp_getMenuContenedor()');
            return response()->json(["datos" => $listado, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["datos" => $e->getMessage(), "status"=>false], 201);
        }
    }

    public function get_menu_contenedor(){
        try {
            $datos = DB::select('call sp_getMenuContenedor()');
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["datos"=>$e->getMessage(), "status"=>false], 201);
        }
    }

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

    public function get_menu_item(){
        try {
            $datos = MenuItem::all();
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["datos"=>$e->getMessage(), "status"=>false], 201);
        }
    }

    public function create_menu_contenedor_items(Request $request){
        try {
            $registro = new MenuContenedorItem();
            $registro->id_menu_contenedor = $request->input('id_menu_contenedor');
            $registro->id_menu_item = $request->input('id_menu_item');
            $registro->save();

            $datos = DB::select('call sp_getMenuContenedorItem()');
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["datos"=>$e->getMessage(), "status"=>false], 201);
        }
    }

    public function get_menu_contenedor_items(){
        try {
            $datos = DB::select('call sp_getMenuContenedorItem()');
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["datos"=>$e->getMessage(), "status"=>false], 201);
        }
    }

}
