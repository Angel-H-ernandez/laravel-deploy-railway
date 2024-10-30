<?php

namespace App\Http\Controllers;

use App\Models\User_administrador_model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Trabajador_model;
use App\Models\Users_model;

class User_administrador_controller extends Controller
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
        $trabajador = Trabajador_model::where('correo', $request->correo)
            ->where('password', $request->password)
            ->first();

        if($trabajador->isEmpty()){
            //buscar si es usuario
            $user = User_model::where('correo', $request->correo)
                ->where('password', $request->password)
                ->first();

            if($user->isEmpty()){

                //buscar si es usuario administrador
                $user_admin = User_administrador_model::where('correo', $request->correo)
                    ->where('password', $request->password)
                    ->first();

                if($user_admin->isEmpty()){
                    $data = [
                        'login' => false,
                        'status' => 401,
                        'tipo_user' => 'No existe usuario',

                    ];
                    return response()->json($data, 401);
                }

                $data = [
                    'login' => true,
                    'status' => 200,
                    'tipo_user' => 'Usuario administrador',
                    'user' => $user_admin,
                ];

                return response()->json($data, 200);

            }

            $data = [
                'login' => true,
                'status' => 200,
                'tipo_user' => 'Usuario',
                'user' => $user,
            ];

            return response()->json($data, 200);

        }

        $data = [
            'login' => true,
            'status' => 200,
            'tipo_user' => 'Trabajador',
            'user' => $trabajador,
        ];
        return response()->json($data, 200);




        //buscar si es usuario administrador

    }
}
