<?php

namespace App\Http\Controllers;

use App\Models\Area_producto_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Area_producto_controller extends Controller
{
    //
    public function index($id_usuario){

        $area_prodcuto = Area_producto_model::where('id_usuario',$id_usuario)->get();

        if(!$area_prodcuto){
            $data = [
                'mensaje' => 'No se encontraron resultados',
                'codigo' => 404,
            ];
            return response()->json($data, 404);
        }

        $data = [
            'area' => $area_prodcuto,
            'status' => 200
        ];
        return response()->json($data, 200);




    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'nombre' => 'required|string|max:255',
            'id_usuario' => 'required|integer',
            'id_almacen' => 'required|integer',
            'id_sucursal' => 'required|integer',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }

        $area_producto = Area_producto_model::create(
            [
                'nombre' => $request->nombre,
                'id_sucursal'=>$request->id_sucursal,
                'id_usuario'=>$request->id_usuario,
                'id_almacen'=>$request->id_almacen
            ]
        );

        if(!$area_producto){
            $data = [
                'mensaje' => 'No se pudo crear la area',
                'codigo' => 400,
            ];
            return response()->json($data, 400);
        }

        $data = [
            'mensaje' => 'Area creada exitosamente',
            'codigo' => 201,
            'area_producto' => $area_producto
        ];
        return response()->json($data, 201);

    }

    public function update(Request $request, $id){

        $validator = Validator::make($request->all(),[
            'nombre' => 'required|string|max:255',
            'id_usuario' => 'required|integer',
            'id_almacen' => 'required|integer',
            'id_sucursal' => 'required|integer',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }

        $area_producto = Area_producto_model::find($id);

        if(!$area_producto){
            $data = [
                'mensaje' => 'No se encontro la area',
                'codigo' => 404,
            ];
            return response()->json($data, 404);
        }

        $area_producto->nombre = $request->nombre;
        $area_producto->id_usuario = $request->id_usuario;
        $area_producto->id_sucursal = $request->id_sucursal;
        $area_producto->id_almacen = $request->id_almacen;
        $area_producto->save();

        $data = [
            'mensaje' => 'Area actualizada exitosamente',
            'codigo' => 200,
            'area_producto' => $area_producto
        ];
        return response()->json($data, 200);



    }

}
