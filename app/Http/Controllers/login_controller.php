<?php

namespace App\Http\Controllers;

use App\Models\Trabajador_model;
use App\Models\User_administrador_model;
use App\Models\Users_model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class login_controller extends Controller
{

    public function login(Request $request){
        //validar formato de entrada
        $validator = Validator::make($request->all(), [
            'correo' => 'required|string|email|max:255',
            'password' => 'required|string|min:3',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        //buscar si es trabajador
        $trabajador = Trabajador_model::where('email', $request->correo)
            ->where('password', $request->password)
            ->first();

        if(!$trabajador){
            //buscar si es usuario
            $user = Users_model::where('correo', $request->correo)
                ->where('password', $request->password)
                ->first();

            if(!$user){
                //ELIMINAR; un usuario administrador no puede iniciar sesion aqui
                //buscar si es usuario administrador
                $user_admin = User_administrador_model::where('correo', $request->correo)
                    ->where('password', $request->password)
                    ->first();

                if(!$user_admin){
                    $data = [
                        'login' => false,
                        'status' => 401,
                        'tipo_user' => 'No existe usuario',

                    ];
                    return response()->json($data, 401);
                }

                $data = [
                    'login' => $user_admin->activo,
                    'status' => 200,
                    'tipo_user' => 'Usuario administrador',
                    'user' => $user_admin,
                ];

                return response()->json($data, 200);

            }

            $data = [
                'login' => $user->activo,
                'status' => 200,
                'tipo_user' => 'Usuario',
                //'user' => $user,
                'id_usuario' => $user->id
            ];

            return response()->json($data, 200);

        }

        $data = [
            'login' => $trabajador->activo,
            'status' => 200,
            'tipo_user' => 'Trabajador',
            //'user' => $trabajador,
            'id_user' => $trabajador->id_usuario,
            'id_trabajador' => $trabajador->id
        ];
        return response()->json($data, 200);

    }
}
