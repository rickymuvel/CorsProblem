<?php

namespace App\Http\Controllers;

use App\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function getProveedores()
    {
         $listado = Proveedor::all();
         $datos = array(
             "listado" => $listado
         );
         return response()->json($datos, 201);
    }

    public function setProveedor(Request $request)
    {
        $proveedor = new Proveedor();
        $proveedor->razon_social = $request->input('razon_social');
        $proveedor->ruc = $request->input('ruc');
        $proveedor->rubro = $request->input('rubro');
        $proveedor->telefono1 = $request->input('telefono1');
        $proveedor->telefono2 = $request->input('telefono2');
        $proveedor->telefono3 = $request->input('telefono3');
        $proveedor->representante = $request->input('representante');
        $proveedor->contacto = $request->input('contacto');
        $proveedor->telf_contacto = $request->input('telf_contacto');
        $proveedor->save();

        return response()->json(['exito' => true], 201);
    }
}
