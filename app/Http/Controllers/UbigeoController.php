<?php

namespace App\Http\Controllers;

use App\Ubigeo;
use Illuminate\Http\Request;

class UbigeoController extends Controller
{
    public function buscar(Request $request)
    {
        $registros = Ubigeo::where('dist', 'like', '%'. $request->input('term') . '%')->get();
        return response()->json(["ubigeo" => $registros], 201);
    }
}
