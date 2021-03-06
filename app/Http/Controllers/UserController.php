<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use JWTAuth;

class UserController extends Controller
{
    public function set(Request $request)
    {
        $obj = new User();
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
        $obj->user = $request->input("user");
        $obj->password = bcrypt($request->input("dni"));
        $obj->contacto_emergencia = $request->input("contacto_emergencia");
        $obj->telef_contacto = $request->input("telef_contacto");
        $obj->id_perfil = $request->input("id_perfil");
        $obj->turno = $request->input("turno");
        $obj->remember_token = str_random(10);
        $obj->save();
        // llamamos al procedimiento almacenado con el ultimo registro ingresado.
        $consulta = DB::select("call sp_getUsuario(". $obj->id .")");
        return response()->json(["usuarios"=>$consulta], 201);
    }
    public function update(Request $request)
    {
        $fecha_nac = explode("T", $request->input("fecnac"));
        $fecha_ingreso = explode("T", $request->input("fec_ingreso"));
        try {
            User::where('id', $request->input('id'))->update([
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
                'user' => $request->input("user"),
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
        return response()->json(["editado"=>$editado, "msj" => $msj], 201);
    }
    public function get(){
        $consulta = DB::select('call sp_getUsuarios()');
        return response()->json(["usuarios"=>$consulta], 201);
    }

    public function getUsuariosxPerfil($id_perfil){
        try {
            $listado = User::where('id_perfil', $id_perfil)->get();
            return response()->json(["datos"=>$listado, "status"=>true], 201);
        }catch(\Exception $e){
            return response()->json(["msj"=>$e->getMessage(), "code" => $e->getCode(), "status"=>false, ], 201);
        }
    }
}
