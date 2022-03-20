<?php

namespace App\Http\Controllers;

use App\Models\Localidad;
use App\Models\Provincia;
use Illuminate\Http\Request;

class LocalidadController extends Controller
{
    public function getByParent(Request $request)
    {
        try {

            if(!$request->ajax())
                throw new \Exception("Method not Available.");

            $provincia = Provincia::find($request->id);

            return Localidad::whereProvinciaCodigo($provincia->codigo)->get();

        } catch(\Exception $ex) {

            return response()->json(['error' => MSG_ERROR . $ex->getMessage()], 400);

        }
    }
}
