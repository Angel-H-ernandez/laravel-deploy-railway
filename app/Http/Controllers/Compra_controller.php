<?php

namespace App\Http\Controllers;

use App\Models\Compra_model;
use Illuminate\Http\Request;

class Compra_controller extends Controller
{
    //
    public function index($id){
        $compras = Compra_model::where('id_usuario', $id)->get();

        if(!$compras){
            $data = [
                'datos' => 'no hay compras con ese id',
                'status' => '404'
            ];
            return response()->json($data, 404);
        }

        $data = [
            'datos' => $compras,
            'satus' => '200'
        ];
        return response()->json($data, 200);
    }
    public function show($id){

    }
    public function store(Request $request, $id){

        $validator = Validator($request->all(), [
            'id_sucursal' => 'required|integer',
            'descripcion' => 'required|string',
            'monto' => 'required|integer',
            'id_provedor' => 'required|integer',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $compra = Compra_model::create([
            'id_sucursal' => $request->id_sucursal,
            'id_usuario' => $id,
            'descripcion' => $request->descripcion,
            'monto' => $request->monto,
            'id_provedor' => $request->id_provedor,
        ]);

        if(!$compra){
            $data = [
                'datos' => 'Error al crear compra',
                'status' => '404'
            ];
            return response()->json($data, 404);
        }

        $data = [
            'datos' => $compra,
            'status' => '201'
        ];
        return response()->json($data, 201);

    }
    public function update($id, Request $request){

        $validator = Validator($request->all(), [
            'id_sucursal' => 'required|integer',
            'descripcion' => 'required|string',
            'monto' => 'required|integer',
            'id_provedor' => 'required|integer',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $compra = Compra_model::find($id);
        if(!$compra){
            $data = [
                'datos' => 'No existe compra con ese id',
                'status' => '404'
            ];
            return response()->json($data, 404);
        }

        $compra->id_sucursal = $request->id_sucursal;
        $compra->descripcion = $request->descripcion;
        $compra->monto = $request->monto;
        $compra->id_provedor = $request->id_provedor;
        $compra->save();

        $data = [
            'datos' => $compra,
            'status' => '200'
        ];
        return response()->json($data, 200);
    }
    public function delete($id){
        $compra = Compra_model::find($id);
        if(!$compra){
            $data = [
                'datos' => 'No existe compra con ese id',
                'status' => '404'
            ];
            return response()->json($data, 404);
        }
        $compra->delete();

        $data = [
            'datos' => 'Compra eliminada',
            'status' => '200'
        ];
        return response()->json($data, 200);

    }
}
