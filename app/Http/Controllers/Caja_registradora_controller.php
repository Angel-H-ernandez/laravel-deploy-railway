<?php

namespace App\Http\Controllers;

use App\Models\Caja_registradora_model;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class Caja_registradora_controller extends Controller
{
    public function show($id)
    {
        $caja_registradora = Caja_registradora_model::find($id);
        if(!$caja_registradora){
            $data = [
                'error' => 'No existe la caja registradora con ese id'
            ];
            return response()->json($data, 404);
        }
        $data = [
            "mensaje" => "La caja registradoras en contro con exito",
            "data" => $caja_registradora
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'id_trabajador' => 'required |integer',
            'id_sucursal' => 'required |integer',
            'id_usuario' => 'required |integer',
            'dinero' => 'required |integer'

        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        $caja_registradora = Caja_registradora_model::find($id);
        if(!$caja_registradora){
            $data = [
                'error' => 'No existe la caja registradora con ese id'
            ];
            return response()->json($data, 404);
        }

        $caja_registradora->id_trabajador = $request->id_trabajador;
        $caja_registradora->id_sucursal = $request->id_sucursal;
        $caja_registradora->id_usuario = $request->id_usuario;
        $caja_registradora->dinero = $request->dinero;
        $caja_registradora->save();

        if(!$caja_registradora){
            $data = [
                'error' => 'No se pudo actualizar la caja registradora'
            ];
            return response()->json($data, 400);
        }

        $data = [
            'message' => 'Caja registradora actualizada',
            'data' => $caja_registradora
        ];
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_trabajador' => 'required |integer',
            'id_sucursal' => 'required |integer',
            'id_usuario' => 'required |integer',
            'dinero' => 'required |integer'

        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        $caja_registradora = new Caja_registradora_model();
        $caja_registradora->id_trabajador = $request->id_trabajador;
        $caja_registradora->id_sucursal = $request->id_sucursal;
        $caja_registradora->id_usuario = $request->id_usuario;
        $caja_registradora->dinero = $request->dinero;
        $caja_registradora->save();

        if(!$caja_registradora){
            $data = [
                'error' => 'No se pudo guardar la caja registradora'
            ];
            return response()->json($data, 400);
        }

        $data = [
            'message' => 'Caja registradora guardada',
            'data' => $caja_registradora
        ];
        return response()->json($data, 201);
    }
}
