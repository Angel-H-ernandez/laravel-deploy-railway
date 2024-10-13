<?php

namespace App\Librerias;

use App\Models\Users_model;
use function PHPUnit\Framework\isEmpty;

class Validar_usuario
{
    public static function isUsuarioActivo($id_usuario){

        $usuario = Users_model::find($id_usuario);


        return $usuario->activo;



    }
}
