<?php

namespace App\Http\Controllers;
use App\Models\Area_trabajador_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Area_trabajador_controller extends Controller
{
    public function index($id_usuario){
        $area_trabajador = Area_trabajador_model::where('id_usuario',$id_usuario)->get();

        if(!$area_trabajador){
            $data = [
                'mensaje' => 'No se encontraron areas de trabajsdores',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'areas' => $area_trabajador,
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

        $area_trabajador = Area_trabajador_model::create([
            'nombre' => $request->get('nombre'),
            'id_usuario' => $request->id_usuario,
            'id_sucursal' => $request->id_sucursal,


        ]);

        if(!$area_trabajador){
            $data = [
                'mensaje' => 'area de trabajador no pudo ser creado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'mensaje' => 'area de trabajador creado',
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

        $area_trabajador = Area_trabajador_model::find($id);

        if(!$area_trabajador){
            $data = [
                'menssaje' => "area de trabajador no se encuentra registrado",
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $area_trabajador->nombre = $request->nombre;
        $area_trabajador->id_usuario = $request->id_usuario;
        $area_trabajador->id_sucursal = $request->id_sucursal;

        $area_trabajador->save();

        $data = [
            'mensaje' => 'area de trabajo actualizado',
            'status' => 200,
            'area_trabajador' => $area_trabajador
        ];
        return response()->json($data, 200);


    }
}
