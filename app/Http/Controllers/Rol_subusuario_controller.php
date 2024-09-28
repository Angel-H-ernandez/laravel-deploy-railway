<?php

namespace App\Http\Controllers;

use App\Models\Rol_subusuario_model;
use Illuminate\Http\Request;
use App\Librerias\Validar_usuario;

class Rol_subusuario_controller extends Controller
{
    //
    public function index($id_usuario){

            Validar_usuario::isUsuarioActivo($id_usuario);

            $roles_subusuario = Rol_subusuario_model::where('id_usuario',$id_usuario)->get();

            if($roles_subusuario->isEmpty()){
                $datos = [
                    'Mensaje' => 'Registros no encontrados',
                    'status' => 404
                ];
                return response()->json($datos, 404);
            }
            $datos = [
                'roles_subusuario' => $roles_subusuario,
                'status' => 200
            ];
            return response()->json($datos, $datos['status']);
    }

    public function store(Request $request){

        $validator = Validator($request->all(), [
            'nombre' => 'required|string|not_in:0',
            'id_permisos_subusuario' => 'required|integer|not_in:0',
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $rol_subusuario = Rol_subusuario_model::create([
            'nombre' => $request->nombre,
            'id_permisos_subusuario' => $request->id_permisos_subusuario,
        ]);

        if(!$rol_subusuario){
            $data = [
                'Mensaje' => 'Error al crear registro',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'Mensaje' => 'Registro creado satisfactoriamente',
            'status' => 200
        ];
        return response()->json($data, 200);


    }

    public function update(Request $request, $id){

        $validator = Validator($request->all(), [
            'nombre' => 'required|string|not_in:0',
            'id_permisos_subusuario' => 'required|integer|not_in:0',
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $rol_subusuario = Rol_subusuario_model::find($id);

        if($rol_subusuario->isEmpty()){
            $data = [
                'Mensaje' => 'Registro no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $rol_subusuario->nombre = $request->nombre;
        $rol_subusuario->id_permisos_subusuario = $request->id_permisos_subusuario;
        $rol_subusuario->save();

        $data = [
            'Mensaje' => 'Registro actualizado satisfactoriamente',
            'status' => 200
        ];
        return response()->json($data, 200);


    }
}
