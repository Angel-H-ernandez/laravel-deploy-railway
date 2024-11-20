<?php

namespace App\Http\Controllers;

use App\Models\Rembolso_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Rembolso_controller extends Controller
{
    //
    public function index($id_usuario)
    {
        $rembolso = Rembolso_model::get()->where('id_usuario', $id_usuario);

        if($rembolso->isEmpty()){
            $data = [
                'error' => 'No se encontraro rembolsos'
            ];
            return response()->json($data, 404);
        }

        $data = [
            'rembolso' => $rembolso,
            'message' => 'rembolsos obtenido'
        ];

        return response()->json($data, 200);


    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'monto' => 'required |integer',
            'fecha' => 'required |date',
            'id_sucursal' => 'required |integer',
            'id_usuario' => 'required |integer',
            "id_cliente" => 'required |integer'

        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        $rembolso = Rembolso_model::create([
            'monto' => $request->monto,
            'id_sucursal' => $request->id_sucursal,
            'id_usuario' => $request->id_usuario,
            'id_cliente' => $request->id_cliente
        ]);

        if(!$rembolso){
            $data = [
                'message' => "error, no se puedo crear el registro"
            ];
            return  response()->json($data, 400);
        }
        $data = [
            "message" => "rembolso creado con exito",
            "rembolso" => $rembolso
        ];
        return response()->json($data, 201);
    }

    public function show($id)
    {
        $rembolso = Rembolso_model::find($id);
        if(!$rembolso){
            $data = [
                'error' => 'No existe el rembolso con ese id'
            ];
            return response()->json($data, 404);
        }
        $data = [
            "message" => "rembolso encontrado con exito",
            "rembolso" => $rembolso
        ];
        return response()->json($data, 200);
    }
}
