<?php

namespace App\Http\Controllers;

use App\Models\Almacen_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Almacen_Controller extends Controller
{
    //
    public function index($id_usuario){
        $almacenes = Almacen_model::where('id_usuario',$id_usuario)->get();

        if(!$almacenes){
            $data = [
                'mensaje' => 'No se encontraron almacenes',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'almacenes' => $almacenes,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'nombre' => 'required|string|max:255',
            'id_usuario' => 'required|integer',
            'id_sucursal' => 'required|integer',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }

        $almacen = Almacen_model::create([
            'nombre' => $request->get('nombre'),
            'id_usuario' => $request->id_usuario,
            'id_sucursal' => $request->id_sucursal

        ]);

        if(!$almacen){
            $data = [
                'mensaje' => 'Almacen no pudo ser creado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'mensaje' => 'Almacen agregado',
            'status' => 201
        ];
        return response()->json($data, 201);

    }

    public function update(Request $request, $id){

        $validator = Validator::make($request->all(),[
            'nombre' => 'required|string|max:255',
            'id_usuario' => 'required|integer',
            'id_sucursal' => 'required|integer',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }

        $almacen = Almacen_model::find($id);

        if(!$almacen){
            $data = [
                'menssaje' => "Almacen no existe",
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $almacen->nombre = $request->nombre;
        $almacen->id_usuario = $request->id_usuario;
        $almacen->id_sucursal = $request->id_sucursal;

        $almacen->save();

        $data = [
            'mensaje' => 'Almacen actualizado',
            'status' => 200,
            'almacen' => $almacen
        ];
        return response()->json($data, 200);


    }


}
