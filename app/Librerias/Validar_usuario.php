<?php

namespace App\Librerias;

use App\Models\Trabajador_model;
use App\Models\User_administrador_model;
use App\Models\Users_model;
use function PHPUnit\Framework\isEmpty;

class Validar_usuario
{
    public static function isUsuarioActivo($id_usuario){

        $usuario = Users_model::find($id_usuario);


        return $usuario->activo;



    }

    public static function isActivoUsuario($id){
        //buscar si es trabajador
        $trabajador = Trabajador_model::find($id);

        //si no es trabajador
        if($trabajador->isEmpty()){
            //buscar si es usuario
            $user = Users_model::find($id);
            //si no es usuario

            $data = [
                'status' => 200,
                'user_activo' => $user->activo,
            ];

            return response()->json($data, 200);
        }

        $data = [
            'usuario_activo' => $trabajador->activo,
            'status' => 200,
        ];
        return response()->json($data, 200);
    }

}
