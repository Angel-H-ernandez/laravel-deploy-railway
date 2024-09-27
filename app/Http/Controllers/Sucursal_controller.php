<?php

namespace App\Http\Controllers;

use App\Librerias\Validar_usuario;
use App\Models\Sucursal_model;
use Illuminate\Http\Request;

class Sucursal_controller extends Controller
{
    //
    public function index($id_usuario){

        $permiso = Validar_usuario::isUsuarioActivo($id_usuario);
        if(!$permiso){
            $data = [
                'message' => "usuario no autorizado",
                'status' => 403,
            ];
            return response()->json($data, 403);
        }

        $sucursales = Sucursal_model::where('id_usuario', $id_usuario)->get();

        if($sucursales->isEmpty()){
            $datos = [
                "mensaje" => "No se encontraron registros",
                "status" => 404
            ];
            return response()->json($datos, $datos["status"]);
        }

        $datos = [
            "sucursales" => $sucursales,
            "status" => 200
        ];

        return response()->json($datos, $datos["status"]);
    }

    public function store(Request $request){

        $validator = Validator($request->all(), [
            'nombre' => 'required|string|min:3|max:100',
            'direccion' => 'nullable|string|min:3|max:100',
            'telefono' => 'nullable|integer',
            'id_usuario' => 'required|integer|min:3|max:100',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $sucursal = Sucursal_model::create([
                'nombre' => $request->nombre,
                'direccion' => $request->direccion,
                'telefono' => $request->telefono,
                'id_usuario' => $request->id_usuario
            ]

        );

        if(!$sucursal){
            $datos = [
                'mensaje' => 'Error al crear registro',
                'status' => 404
            ];
            return response()->json($datos, $datos["status"]);
        }

        $datos = [
            'sucursal' => $sucursal,
            'status' => 201,
            'message' => 'Registro creado satisfactoriamente'
        ];
        return response()->json($datos, $datos["status"]);

    }

    public function show($id){
        $sucursal = Sucursal_model::find($id);

        if(!$sucursal){
            $datos = [
                'mensaje' => 'Registro no encontrado',
                'status' => 404
            ];
            return response()->json($datos, $datos["status"]);
        }

        $datos = [
            'sucursal' => $sucursal,
            'status' => 200

        ];
        return response()->json($datos, $datos["status"]);

    }

    public function update(Request $request, $id){
        $validator = Validator($request->all(), [
            'nombre' => 'required|string|min:3|max:100',
            'direccion' => 'nullable|string|min:3|max:100',
            'telefono' => 'nullable|integer',
            'id_usuario' => 'required|integer',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $sucursal = Sucursal_model::find($id);

        if(!$sucursal){
            $datos = [
                'mensaje' => 'Registro no encontrado',
                'status' => 404
            ];
            return response()->json($datos, $datos["status"]);
        }

        $sucursal->nombre = $request->nombre;
        $sucursal->direccion = $request->direccion;
        $sucursal->telefono = $request->telefono;
        $sucursal->id_usuario = $request->id_usuario;

        $sucursal->save();

        $datos = [
            'sucursal' => $sucursal,
            'status' => 200,
            'message' => 'Registro actualizado satisfactoriamente'
        ];
        return response()->json($datos, $datos["status"]);



    }

    public function destroy($id){
        $sucursal = Sucursal_model::find($id);

        if(!$sucursal){
            $datos = [
                'mensaje' => 'Registro no encontrado',
                'status' => 404
            ];
            return response()->json($datos, $datos["status"]);
        }

        $sucursal->delete();
        $datos = [
            'sucursal' => $sucursal,
            'status' => 200,
            'message' => 'Registro eliminado satisfactoriamente'
        ];
        return response()->json($datos, $datos["status"]);
    }

}
