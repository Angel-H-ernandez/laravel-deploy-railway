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

    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(), [
            'nombre' => 'required|string',
            'id_area_producto' => 'required|numeric',
            'cantidad' => 'required|integer',
            'precio' => 'required|integer',
            'id_usuario' => 'required|integer',
            'descuento' => 'nullable|integer',
            'caducidad' => 'nullable|date',
            'pedidos_automaticos' => 'nullable|boolean',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 422);
        }

        $producto = Producto_model::find($id);

        if(!$producto){
            $datos = [
                'datos' => 'Registro no encontrado con ese id',
                'status' => 404
            ];
            return response()->json($datos, $datos["status"]);
        }

        $producto->nombre = $request->nombre;
        $producto->id_area_producto = $request->id_area_producto;
        $producto->cantidad = $request->cantidad;
        $producto->precio = $request->precio;
        $producto->id_usuario = $request->id_usuario;
        $producto->descuento = $request->descuento;
        $producto->caducidad = $request->caducidad;
        $producto->pedidos_automaticos = $request->pedidos_automaticos;
        $producto->save();

        $datos = [
            'producto' => $producto,
            'status' => 200,
            'message' => 'Registro actualizado satisfactoriamente'
        ];
        return response()->json($datos, $datos["status"]);
    }

    public function store(Request $request){
        $validator = Validator($request->all(), [
            'nombre' => 'required|string',
            'id_area_producto' => 'required|numeric',
            'cantidad' => 'required|integer',
            'precio' => 'required|integer',
            'id_usuario' => 'required|integer',
            'descuento' => 'nullable|integer',
            'caducidad' => 'nullable|date',
            'pedidos_automaticos' => 'nullable|boolean',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 422);
        }
        $producto = Producto_model::create([
            'nombre' => $request->nombre,
            'id_area_producto' => $request->id_area_producto,
            'cantidad' => $request->cantidad,
            'precio' => $request->precio,
            'id_usuario' => $request->id_usuario,
            'descuento' => $request->descuento,
            'caducidad' => $request->caducidad,
            'pedidos_automaticos' => $request->pedidos_automaticos,
        ]);
        if(!$producto){
            $datos = [
                'mensaje' => 'Error al crear registro',
                'status' => 400
            ];
            return response()->json($datos, $datos["status"]);
        }
        $datos = [
            'producto' => $producto,
            'status' => 201,
            'message' => 'Registro creado satisfactoriamente'
        ];
        return response()->json($datos, $datos["status"]);
    }

    public function delete($id){
        $producto = Producto_model::find($id);
        if(!$producto){
            $datos = [
                'mensaje' => 'Registro no encontrado con ese id',
                'status' => 404
            ];
            return response()->json($datos, $datos["status"]);
        }
        $producto->delete();
        $datos = [
            'producto' => $producto,
            'status' => 200,
            'message' => 'Registro eliminado satisfactoriamente'
        ];
        return response()->json($datos, $datos["status"]);

    }

    public function show($id){
        $producto = Producto_model::find($id);
        if(!$producto){
            $data = [
                'error' => "No existe producto con id ".$id
            ];
            return response()->json($data, 404);
        }
        $data = [
            'datos' => $producto,
            'status' => 200
        ];
        return response()->json($data, 200);
    }










}
