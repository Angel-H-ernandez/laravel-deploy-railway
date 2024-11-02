<?php

namespace App\Http\Controllers;

use App\Models\Trabajador_model;
use Illuminate\Http\Request;

class Trabajador_controller extends Controller
{
    //
    public function index($id){
        $trabajadores = Trabajador_model::where('id_usuario', $id)->get();

        //si no hay trabajadores
        if($trabajadores->isEmpty()){
            $data = [
                'mensaje' => 'No se encontraron trabajadores asociados a ese id',
                'status' => 202
            ];
            return response()->json($data, 404);
        }

        $data = [
            'datos' => $trabajadores,
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}
