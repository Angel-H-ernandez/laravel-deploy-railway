<?php

namespace App\Http\Controllers;

use App\Models\Permisos_subusuario_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Permisos_subusuario_controller extends Controller
{
    public function get($id){
        $permisos_subusuario  = Permisos_subusuario_model::find($id);

        if($permisos_subusuario->isEmpty()){
            $data = [
                'mensaje' => 'No se encuentra el permiso solicitado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'permisos_subusuario' => $permisos_subusuario,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id){
        $permisos_subusuario = Permisos_subusuario_model::find($id);

        if($permisos_subusuario->isEmpty()){
            $data = [
                'mensaje' => 'No se encuentra el permiso solicitado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(),[
            'ver' => "required|boolean",
            'vender' => "required|boolean",
            'editar' => "required|boolean",
            'crear' => "required|boolean",
        ]);
        if($validator->fails()){
            $data = [
                'mensaje' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $permisos_subusuario->ver = $request->ver;
        $permisos_subusuario->vender = $request->vender;
        $permisos_subusuario->editar = $request->editar;
        $permisos_subusuario->crear = $request->crear;

        $permisos_subusuario->save();

        $data = [
            'permisos_subusuario' => $permisos_subusuario,
            'status' => 200,
            'message'=> 'Permiso solicitado actualizado correctamente'
        ];
        return response()->json($data, 200);

    }
}
