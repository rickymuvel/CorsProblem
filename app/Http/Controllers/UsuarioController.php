<?php

namespace App\Http\Controllers;

use App\Ubigeo;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{

    public function setUsuario(Request $request)
    {
        $obj = new Usuario();
        $obj->dni = $request->input("dni");
        $obj->ap_paterno = $request->input("ap_paterno");
        $obj->ap_materno = $request->input("ap_materno");
        $obj->nombres = $request->input("nombres");
        $fecha_nac = explode("T", $request->input("fecnac"));
        $obj->fecnac = $fecha_nac[0];
        $obj->est_civil = $request->input("est_civil");
        $fecha_ingreso = explode("T", $request->input("fec_ingreso"));
        $obj->fec_ingreso = $fecha_ingreso[0];
        $obj->movil = $request->input("movil");
        $obj->fijo = $request->input("fijo");
        $obj->direccion = $request->input("direccion");
        $obj->idubigeo = $request->input("idubigeo");
        $obj->email_corp = $request->input("email_corp");
        $obj->email_per = $request->input("email_per");
        $obj->login = $request->input("login");
        $obj->contacto_emergencia = $request->input("contacto_emergencia");
        $obj->telef_contacto = $request->input("telef_contacto");
        $obj->id_perfil = $request->input("perfil");
        $obj->turno = $request->input("turno");
        $obj->remember_token = str_random(10);
        $obj->save();

        // llamamos al procedimiento almacenado con el ultimo registro ingresado.
        $consulta = DB::select("call sp_getUsuario(". $obj->id .")");

        return response()->json(["usuarios"=>$consulta], 201);
    }

    public function updateUsuario(Request $request)
    {
        $fecha_nac = explode("T", $request->input("fecnac"));
        $fecha_ingreso = explode("T", $request->input("fec_ingreso"));
        try {
            Usuario::find($request->input('id'))->update([
                'ap_paterno' => $request->input("ap_paterno"),
                'ap_materno' => $request->input("ap_materno"),
                'nombres' => $request->input("nombres"),
                'fecnac' => $fecha_nac[0],
                'est_civil' => $request->input("est_civil"),
                'fec_ingreso' => $fecha_ingreso[0],
                'movil' => $request->input("movil"),
                'fijo' => $request->input("fijo"),
                'direccion' => $request->input("direccion"),
                'idubigeo' => $request->input("idubigeo"),
                'email_corp' => $request->input("email_corp"),
                'email_per' => $request->input("email_per"),
                'login' => $request->input("login"),
                'contacto_emergencia' => $request->input("contacto_emergencia"),
                'telef_contacto' => $request->input("telef_contacto"),
                'id_perfil' => $request->input("id_perfil"),
                'turno' => $request->input("turno")
            ]);
            $editado = true;
            $msj = "Todo bien";
        }catch (\Exception $e){
            $editado = false;
            $msj = $e->getMessage();
        }

        return response()->json(["editado"=>$editado, "msj"=> $msj], 201);
    }

    public function getUsuarios(){
        $consulta = DB::select('call sp_getUsuarios()');
        return response()->json(["usuarios"=>$consulta], 201);
    }
}
