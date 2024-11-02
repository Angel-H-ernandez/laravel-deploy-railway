<?php

namespace App\Http\Controllers;

use App\Models\Provedor_model;
use Illuminate\Http\Request;

class Provedor_controller extends Controller
{
    //
    public function index($id){
        $provedores = Provedor_model::where('id_usuario', $id)->get();
        if($provedores->isEmpty()){
            $data = [
                'datos' => 'No se encontraron provedores asociados a ese id',
                'status' => 202
            ];
            return response()->json($data, 404);
        }
        $data = [
            'datos' => $provedores,
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}
