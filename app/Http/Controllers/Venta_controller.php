<?php

namespace App\Http\Controllers;

use App\Models\Venta_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Venta_controller extends Controller
{
    //
    public function index($id_usuario){

        $ventas = Venta_model::where('id_usuario', $id_usuario)->get();

        if(!$ventas){
            $data = [
                "msg" => "No se encontraron ventas con ese id_usuario",
                "status" => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            "status" => 200,
            "datos" => $ventas
        ];
        return response()->json($data, 200);

    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'id_cliente' => 'required|integer',
            'fecha' => 'required|date',
            'monto' => 'required|numeric',
            'id_sucursal' => 'required|integer',
            'id_trabajador' => 'required|integer',
            'id_usuario' => 'required|integer',
        ]);

        if ($validator->fails()) {
            $data = [
                "msg" => $validator->errors(),
                "status" => 422
            ];
            return response()->json($data, 422);
        }

       $venta = Venta_model::create([
            'id_cliente' => $request->id_cliente,
            'fecha' => $request->fecha,
            'monto' => $request->monto,
            'id_sucursal' => $request->id_sucursal,
            'id_trabajador' => $request->id_trabajador,
            'id_usuario' => $request->id_usuario,
        ]);


        if(!$venta){
            $data = [
                "msg" => "No se pudo guardar la venta",
                "status" => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            "msg" => "venta creada exitosamente",
            "status" => 500,
            "datos" => $venta
        ];
        return response()->json($data, 201);

    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'id_cliente' => 'required|integer',
            'fecha' => 'required|date',
            'monto' => 'required|numeric',
            'id_sucursal' => 'required|integer',
            'id_trabajador' => 'required|integer',
            'id_usuario' => 'required|integer',
        ]);

        if ($validator->fails()) {
            $data = [
                "msg" => $validator->errors(),
                "status" => 422
            ];
            return response()->json($data, 422);
        }

       $venta = Venta_model::find($id);

        if(!$venta){
            $data = [
                "msg" => "No se encontro una venta con ese id",
                "status" => 404
            ];
            return response()->json($data, 404);
        }

        $venta->id_cliente = $request->id_cliente;
        $venta->fecha = $request->fecha;
        $venta->monto = $request->monto;
        $venta->id_sucursal = $request->id_sucursal;
        $venta->id_trabajador = $request->id_trabajador;
        $venta->id_usuario = $request->id_usuario;

        $venta->save();

        $data = [
            "msg" => "venta actualizada exitosamente",
            "status" => 500,
            "datos" => $venta
        ];
        return response()->json($data, 200);
    }

    public function delete($id){
        $venta = Venta_model::find($id);

        if(!$venta){
            $data = [
                "msg" => "No se encontro una venta con ese id",
                "status" => 404
            ];
            return response()->json($data, 404);
        }

        $venta->delete();

        $data = [
            "msg" => "venta eliminada exitosamente",
            "status" => 500,
            "datos" => $venta
        ];
        return response()->json($data, 200);

    }
}
