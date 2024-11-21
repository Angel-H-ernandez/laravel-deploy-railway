<?php

namespace App\Http\Controllers;

use App\Models\Provedor_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

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
        //descencriptar datoss antes de enviar
        foreach ($provedores as $provedor) {
            try {

                if (Str::contains($provedor->correo, 'eyJpdiI6')) {
                    $provedor->correo = Crypt::decryptString($provedor->correo);
                }

                // Verifica si el teléfono está encriptado
                if (Str::contains($provedor->telefono, 'eyJpdiI6')) {
                    $provedor->telefono = Crypt::decryptString($provedor->telefono);
                }
            } catch (\Exception $e) {
                Log::error('Error al desencriptar: ' . $e->getMessage());
            }
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
            'telefono' => Crypt::encryptString((string)$request->telefono),
            'correo' => Crypt::encryptString($request->correo),
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
        $provedor->correo = Crypt::encryptString($request->correo);
        $provedor->telefono = Crypt::encryptString((string)$request->telefono);
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

        // Verifica si el correo está encriptado
        if (Str::contains($provedor->correo, 'eyJpdiI6')) {
            $provedor->correo = Crypt::decryptString($provedor->correo);
        }

        // Verifica si el teléfono está encriptado
        if (Str::contains($provedor->telefono, 'eyJpdiI6')) {
            $provedor->telefono = Crypt::decryptString($provedor->telefono);
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
