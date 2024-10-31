<?php

namespace App\Http\Controllers;

use App\Models\Area_producto_model;
use App\Models\Producto_model;
use Illuminate\Http\Request;

class Producto_controller extends Controller
{
    public function index($id_usuario)
    {   //hacer la consulta sql
        $productos = Producto_model::where('id_usuario', $id_usuario)->get();

        //vertficar si esta vacio
        if($productos->isEmpty()){
            $data = [
                'mensaje' => 'No se encontraron resultados',
                'codigo' => 404,
            ];
            return response()->json($data, 404);
        }

        //si se encontraron
        $data = [
            'datos' => $productos,
            'status' => 200
        ];
        return response()->json($data, 200);
    }










}
