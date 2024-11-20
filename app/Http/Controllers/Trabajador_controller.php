<?php

namespace App\Http\Controllers;

use App\Models\Trabajador_model;
use http\Env\Response;
use Illuminate\Http\Request;

class Trabajador_controller extends Controller
{
    //
    public function index($id){
        $trabajadores = Trabajador_model::where('id_usuario', $id)->get();

        //si no hay trabajadores
        if($trabajadores->isEmpty()){
            $data = [
                'mensaje' => 'No se encontraron trabajadores asociados a ese id',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'datos' => $trabajadores,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'nombre' => 'required|string',
            'telefono' => 'required|integer',
            'email' => 'required|string',
            'id_usuario' => 'required|integer',
            'id_sucursal' => 'required|integer',
            'id_area_trabajador' => 'required|integer',
            'sueldo' => 'required|integer',
            'periodo_pago' => 'required|string',
            'cuenta_bancaria' => 'required|string',
            'password' => 'required|string',
            'activo' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 422);
        }

        $trabajador = Trabajador_model::create([
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'id_usuario' => $request->id_usuario,
            'id_sucursal' => $request->id_sucursal,
            'id_area_trabajador' => $request->id_area_trabajador,
            'sueldo' => $request->sueldo,
            'periodo_pago' => $request->periodo_pago,
            'cuenta_bancaria' => $request->cuenta_bancaria,
            'password' => $request->password,
            'activo' => $request->activo,
        ]);

        if (!$trabajador) {
            $datos = [
                'mensaje' => 'Error al crear registro',
                'status' => 400
            ];
            return response()->json($datos, $datos["status"]);
        }

        $datos = [
            'trabajador' => $trabajador,
            'status' => 201,
            'message' => 'Registro creado satisfactoriamente'
        ];
        return response()->json($datos, $datos["status"]);
    }

    public function update(Request $request, $id){

        $validator = Validator($request->all(), [
            'nombre' => 'required|string',
            'telefono' => 'required|integer',
            'email' => 'required|string',
            'id_usuario' => 'required|integer',
            'id_sucursal' => 'required|integer',
            'id_area_trabajador' => 'required|integer',
            'sueldo' => 'required|integer',
            'periodo_pago' => 'required|integer',
            'cuenta_bancaria' => 'required|string',
            'password' => 'required|string',
            'activo' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 422);
        }

        $trabajador = Trabajador_model::find($id);

        if(!$trabajador){
            $datos = [
                'mensaje' => 'Registro no encontrado',
                'status' => 404
            ];
            return response()->json($datos, $datos["status"]);
        }

        $trabajador->nombre = $request->nombre;
        $trabajador->telefono = $request->telefono;
        $trabajador->email = $request->email;
        $trabajador->id_usuario = $request->id_usuario;
        $trabajador->id_sucursal = $request->id_sucursal;
        $trabajador->id_area_trabajador = $request->id_area_trabajador;
        $trabajador->sueldo = $request->sueldo;
        $trabajador->periodo_pago = $request->periodo_pago;
        $trabajador->cuenta_bancaria = $request->cuenta_bancaria;
        $trabajador->password = $request->password;
        $trabajador->activo = $request->activo;

        $trabajador->save();

        $datos = [
            'trabajador' => $trabajador,
            'status' => 200,
            'message' => 'Registro actualizado satisfactoriamente'
        ];
        return response()->json($datos, $datos["status"]);
    }

    public function delete($id){
        $trabajador = Trabajador_model::find($id);

        if(!$trabajador){
            $datos = [
                'mensaje' => 'Registro no encontrado',
                'status' => 404
            ];
            return response()->json($datos, $datos["status"]);
        }

        $trabajador->delete();
        $datos = [
            'trabajador' => $trabajador,
            'status' => 200,
            'message' => 'Registro eliminado satisfactoriamente'
        ];
        return response()->json($datos, $datos["status"]);
    }

    public function show($id){
        $trabajador = Trabajador_model::find($id);
        if(!$trabajador){
            $data = [
                'error' => "No existe trabajador con id ".$id
            ];
            return response()->json($data, 404);
        }
        $data = [
            'datos' => $trabajador,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

}
