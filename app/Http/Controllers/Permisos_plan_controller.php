<?php

namespace App\Http\Controllers;

use App\Models\Permisos_plan_model;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class Permisos_plan_controller extends Controller
{

    public function show($id)
    {
        $permisos_plan = Permisos_plan_model::find($id);

        if ($permisos_plan->isEmpty()) {
            $data = [
                'mensaje' => 'Permisos plan no encontrado',
                'status' => 404
            ];
            return response()->json($data, $data['status']);
        }

        $data = [
            'permisos_plan' => $permisos_plan,
            'status' => 200
        ];
        return response()->json($data, $data['status']);
    }

    public function update(Request $request, $id){

        $permisos_plan = Permisos_plan_model::find($id);

        if ($permisos_plan->isEmpty()) {
            $data = [
                'mensaje' => 'Permisos plan no encontrado',
                'status' => 404
            ];
            return response()->json($data, $data['status']);
        }

        $validator = Validator::make($request->all(), [
            'online' => 'required|boolean',
            'multiusuario' => 'required|boolean',
            'multisucursal' => 'required|boolean',
            'visualizar' => 'required|boolean',
            'vender' => 'required|boolean',
            'grafricar' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            $data = [
                'mensaje' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, $data['status']);
        }

        $permisos_plan->online = $request->online;
        $permisos_plan->multiusuario = $request->multiusuario;
        $permisos_plan->multisucursal = $request->multisucursal;
        $permisos_plan->visualizar = $request->visualizar;
        $permisos_plan->vender = $request->vender;
        $permisos_plan->grafricar = $request->grafricar;

        $permisos_plan->save();

        $data = [
            'permisos_plan' => $permisos_plan,
            'mensaje' => 'Permisos plan actualizado correctamente',
            'status' => 200
        ];
        return response()->json($data, $data['status']);

    }
}
