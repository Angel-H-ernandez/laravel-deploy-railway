<?php

namespace App\Http\Controllers;

use App\Librerias\Validar_usuario;
use App\Models\Cliente_model;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use function PHPUnit\Framework\isEmpty;

class Cliente_controller extends Controller
{
    //
    public function index($id_usuario){
        $usuario_activo = Validar_usuario::isUsuarioActivo($id_usuario);

        if(!$usuario_activo){
            $data = [
                'message' => 'usuario inactivo',
                'status' => 403
            ];
            return response()->json($data, 403);
        }
        $clientes = Cliente_model::where('id_usuario', $id_usuario)->get();

        if($clientes->isEmpty()){
            $data = [
                'message' => 'No se encontraron clientes',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        foreach ($clientes as $cliente) {
            try {
               if(Str::contains($cliente->email, 'eyJpdiI6')){
                    $cliente->email = Crypt::decryptString($cliente->email);
                }
               if(Str::contains($cliente->telefono, 'eyJpdiI6')){
                    $cliente->telefono = Crypt::decryptString($cliente->telefono);
                }
            } catch (\Exception $e) {
                Log::error('Error al desencriptar: ' . $e->getMessage());
            }
        }

        $data = [
            'datos' => $clientes,
            'status' => 200
        ];
        return response()->json($data, 200);


    }

    public function store(Request $request){
        $usuario_activo = Validar_usuario::isUsuarioActivo($request->id_usuario);

        if(!$usuario_activo){
            $data = [
                'message' => 'usuario inactivo',
                'status' => 403
            ];
            return response()->json($data, 403);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|between:2,100',
            'telefono' => 'required|int',
            'email' => 'required|string|email|max:100',
            'id_usuario' => 'required|integer',

        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 422);
        }

        $cliente = Cliente_model::create([
            'nombre' => $request->nombre,
            'telefono' => Crypt::encryptString((string)$request->telefono),
            'email' => Crypt::encryptString($request->email),
            'id_usuario' => $request->id_usuario
        ]);
        if(!$cliente){
            $data = [
                'message' => 'No se pudo crear el cliente',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'message' => 'El cliente se ha creado correctamente',
            'status' => 201
        ];
        return response()->json($data, 201);
    }


    public function update(Request $request, $id){
        $usuario_activo = Validar_usuario::isUsuarioActivo($request->id_usuario);
        if(!$usuario_activo){
            $data = [
                'message' => 'usuario inactivo',
                'status' => 403
            ];
            return response()->json($data, 403);
        }
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|between:2,100',
            'telefono' => 'required|int',
            'email' => 'required|string|email|max:100',
            'id_usuario' => 'required|integer',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 422);
        }
        $cliente = Cliente_model::find($id);
        if($cliente->isEmpty()){
            $data = [
                'message' => 'El cliente no existe',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $cliente->nombre = $request->nombre;
        $cliente->telefono = Crypt::encryptString((string)$request->telefono);
        $cliente->email = Crypt::encryptString($request->email);
        $cliente->id_usuario = $request->id_usuario;
        $cliente->save();

        $data = [
            'message' => 'El cliente se ha actualizado correctamente',
            'status' => 200
        ];
        return response()->json($data, 200);

    }

    public function delete($id){
        $cliente = Cliente_model::find($id);

        if(!$cliente){
            $data = [
                'message' => 'El cliente no existe',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $cliente->delete();

        $data = [
            'message' => 'El cliente se ha eliminado correctamente',
            'status' => 204
        ];
        return response()->json($data, 204);
    }

    public function show($id){
        $cliente = Cliente_model::find($id);

        if(!$cliente){
            $data = [
                'message' => "cliente no encontrado con ese id",
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        if (Str::contains($cliente->email, 'eyJpdiI6')) {
            $cliente->email = Crypt::decryptString($cliente->email);
        }

        if (Str::contains($cliente->telefono, 'eyJpdiI6')) {
            $cliente->telefono = Crypt::decryptString($cliente->telefono);
        }

        $data = [
            'message' => "cliente encontrado",
            'datos' => $cliente,
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}
