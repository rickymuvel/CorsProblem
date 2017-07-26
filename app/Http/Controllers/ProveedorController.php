<?php

namespace App\Http\Controllers;

use App\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
    public function get()
    {
        try {
            $listado = DB::select('call sp_getProveedores()');
            return response()->json(["datos"=>$listado, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }

    public function set(Request $request)
    {
        try {
            $proveedor = new Proveedor();
            $proveedor->razon_social = $request->input('razon_social');
            $proveedor->ruc = $request->input('ruc');
            $proveedor->id_rubro = $request->input('id_rubro');
            $proveedor->telefono1 = $request->input('telefono1');
            $proveedor->telefono2 = $request->input('telefono2');
            $proveedor->telefono3 = $request->input('telefono3');
            $proveedor->representante = $request->input('representante');
            $proveedor->contacto = $request->input('contacto');
            $proveedor->telf_contacto = $request->input('telf_contacto');
            $proveedor->save();
            $datos = Proveedor::all();
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch (\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }

    public function update(Request $request){
        try {
            Proveedor::where('id', $request->input('id'))->update([
                "razon_social" => $request->input('razon_social'),
                "ruc" => $request->input('ruc'),
                "id_rubro" => $request->input('id_rubro'),
                "telefono1" => $request->input('telefono1'),
                "telefono2" => $request->input('telefono2'),
                "telefono3" => $request->input('telefono3'),
                "representante" => $request->input('representante'),
                "contacto" => $request->input('contacto'),
                "telf_contacto" => $request->input('telf_contacto')
            ]);
            $datos = DB::select('call sp_getProveedores()');
            return response()->json(["datos"=>$datos, "status"=>true], 201);
        }catch (\Exception $e){
            return response()->json(["error_msj"=>$e->getMessage(), "status"=>false, "code" => $e->getCode()], 201);
        }
    }
}
