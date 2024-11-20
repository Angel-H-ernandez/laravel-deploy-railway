<?php

namespace App\Http\Controllers;

use App\Models\Provedor_model;
use Illuminate\Http\Request;

class Provedor_controller extends Controller
{
    //
    public function index($id){
        $provedores = Provedor_model::where('id_usuario', $id)->get();
        if($provedores->isEmpty()){
            $data = [
                'datos' => 'No se encontraron provedores asociados a ese id',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $data = [
            'datos' => $provedores,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function store(Request $request, $id){

        $validator = Validator($request->all(), [
            'nombre' => 'required|string',
            'telefono' => 'required|integer',
            'correo' => 'required|email',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 422);
        }
        $provedor = Provedor_model::create([
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'id_usuario' => $id,
        ]);
        if(!$provedor){
            $data = [
                'datos' => 'Error al crear provedor',
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $data = [
            'datos' => $provedor,
            'status' => 201
        ];
        return response()->json($data, 201);
    }
    public function update($id, Request $request){

        $validator = Validator($request->all(), [
            'nombre' => 'required|string',
            'telefono' => 'required|integer',
            'correo' => 'required|email',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 422);
        }

        $provedor = Provedor_model::find($id);
        if(!$provedor){
            $data = [
                'error' => "No existe proveedor con id ".$id
            ];
            return response()->json($data, 404);
        }

        $provedor->nombre = $request->nombre;
        $provedor->correo = $request->correo;
        $provedor->telefono = $request->telefono;
        $provedor->save();

        $data = [
            'message' => 'Proveedor actualizado',
            'datos' => $provedor,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function show($id){
        $provedor = Provedor_model::find($id);
        if(!$provedor){
            $data = [
                'error' => "No existe proveedor con id ".$id
            ];
            return response()->json($data, 404);
        }
        $data = [
            'datos' => $provedor,
            'status' => 200
        ];
        return response()->json($data, 200);

    }
    public function delete($id){

        $provedor = Provedor_model::find($id);
        if(!$provedor){
            $data = [
                'error' => "No existe proveedor con id ".$id
            ];
            return response()->json($data, 404);
        }
        $provedor->delete();

        $data = [
            'message' => 'Proveedor eliminado',
            'status' => 200
        ];
        return response()->json($data, 200);

    }


}
