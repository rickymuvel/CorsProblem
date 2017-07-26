<?php

namespace App\Http\Controllers;

use App\Rubro;
use Illuminate\Http\Request;

class RubroController extends Controller
{
    public function set(Request $request)
    {
        $obj = new Rubro();
        $obj->nombre = $request->input("nombre");
        $obj->descripcion = $request->input("descripcion");
        $obj->save();

        $datos = Rubro::all();
        return response()->json(["rubros"=>$datos], 201);
    }

    public function update(Request $request)
    {
        try {
            Rubro::where('id', $request->input('id'))->update([
                'nombre' => $request->input("nombre"),
                'descripcion' => $request->input("descripcion")
            ]);
            $editado = true;
            $msj = "Todo bien";
        }catch (\Exception $e){
            $editado = false;
            $msj = $e->getMessage();
        }

        return response()->json(["editado"=>$editado, "msj"=> $msj], 201);
    }

    public function get(){
        $datos = Rubro::all();
        return response()->json(["rubros"=>$datos], 201);
    }
}
