<?php

namespace App\Http\Controllers;

use App\Models\Plan_servicio_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Plan_servicio_controller extends Controller
{
    public function get($id){

        $plan_servicio = Plan_servicio_model::find($id);

        if(!$plan_servicio){
            $data = [
                'mensaje' => 'Plan servicio no encontrado',
                'status' => '404'
            ];
            return response()->json($data, 404);
        }

        $data = [
            'plan_servicio' => $plan_servicio,
            'mensaje' => 'Plan servicio encontrado',
            'status' => '200',
        ];
        return response()->json($data, 200);


    }

    public function update(Request $request, $id){

        $plan_servicio = Plan_servicio_model::find($id);

        if(!$plan_servicio){
            $data = [
                'mensaje' => 'Plan servicio no encontrado',
                'status' => '404'
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'precio' => 'required|numeric',
            'periodo' => 'required|string',
            'id_permiso_plan' => 'required|integer',
        ]);

        if($validator->fails()){
            $data = [
                'mensaje' => $validator->errors(),
                'status' => '400'
            ];
            return response()->json($data, 400);
        }

        $plan_servicio->nombre = $request->nombre;
        $plan_servicio->precio = $request->precio;
        $plan_servicio->periodo = $request->periodo;
        $plan_servicio->id_permiso_plan = $request->id_permiso_plan;

        $plan_servicio->save();
        $data = [
            'mensaje' => 'Plan servicio actualizado',
            'status' => '200',
        ];
        return response()->json($data, 200);


    }
}
