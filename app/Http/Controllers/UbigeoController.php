<?php

namespace App\Http\Controllers;

use App\Ubigeo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UbigeoController extends Controller
{
    public function buscar(Request $request)
    {
        $registros = Ubigeo::where('dist', 'like', '%'. $request->input('term') . '%')->select('idubigeo', 'dpto', 'prov', "dist", DB::raw("CONCAT(dpto,' ',prov,' ',dist) AS ubigeo"))->get();
        return response()->json(["ubigeo" => $registros], 201);
    }
}
