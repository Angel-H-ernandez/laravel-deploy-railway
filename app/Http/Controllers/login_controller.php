<?php

namespace App\Http\Controllers;

use App\Models\Trabajador_model;
use App\Models\User_administrador_model;
use App\Models\Users_model;
use Illuminate\Support\Facades\DB;
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
                /*$user_admin = User_administrador_model::where('correo', $request->correo)
                    ->where('password', $request->password)
                    ->first();

                if(!$user_admin){
                    $data = [
                        'login' => false,
                        'status' => 401,
                        'tipo_user' => 'No existe usuario',

                    ];
                    return response()->json($data, 401);
                }*/

                $data = [
                    'login' => false,
                    'status' => 200,
                    'tipo_user' => 'usuario no registrado',

                ];

                return response()->json($data, 200);

            }

            $permisos = DB::table('users as u')
                ->select('u.nombre', 'm.codigo as vista', 'm.nombre as nombre_vista', 'p.tiene_permiso')
                ->join('plan_servicio as ps', 'u.id_plan_servicio', '=', 'ps.id')
                ->join('permisos_plan as p', 'ps.id', '=', 'p.id_plan')
                ->join('modulos as m', 'p.id_modulo', '=', 'm.id')
                ->where('u.id', $user->id)
                ->orderBy('m.id')
                ->get();

            $data = [
                'login' => $user->activo,
                'status' => 200,
                'tipo_user' => 'Usuario',
                //'user' => $user,
                'id_user' => $user->id,
                'id_trabajador'  => 0,
                'permissos_usuario' => $permisos
            ];

            return response()->json($data, 200);

        }

        $permisos = DB::table('users as u')
            ->select('u.nombre', 'm.codigo as vista', 'm.nombre as nombre_vista', 'p.tiene_permiso')
            ->join('plan_servicio as ps', 'u.id_plan_servicio', '=', 'ps.id')
            ->join('permisos_plan as p', 'ps.id', '=', 'p.id_plan')
            ->join('modulos as m', 'p.id_modulo', '=', 'm.id')
            ->where('u.id', $trabajador->id_usuario)
            ->orderBy('m.id')
            ->get();

        $data = [
            'login' => $trabajador->activo,
            'status' => 200,
            'tipo_user' => 'Trabajador',
            //'user' => $trabajador,
            'id_user' => $trabajador->id_usuario,
            'id_trabajador' => $trabajador->id,
            'permisos_usuario' => $permisos
        ];
        return response()->json($data, 200);

    }
}
