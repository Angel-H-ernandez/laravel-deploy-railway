<?php

namespace App\Librerias;

use App\Models\Users_model;

class Validar_usuario
{
    public static function isUsuarioActivo($id_usuario){

        $usuario = Users_model::find($id_usuario);

        if(!$usuario) {
            return true;
        }
        return $usuario->activo;



    }
}
