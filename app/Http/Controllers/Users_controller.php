<?php

namespace App\Http\Controllers;

use App\Models\Group_task;
use App\Models\Users_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Users_controller extends Controller
{
    public function show($id){
        $user = Users_model::find($id);

        if(!$user){
            $data = [
                'message' => 'User not found',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'user' => $user,
            'message' => 'User found',
            'status' => 200
        ];
        return response()->json($data, 200);

    }

    public function index(){
        $users = Users_model::all();

        if($users->isEmpty()){
            $data = [
                'message' => "No users found",
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'users' => $users,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function store(Request $request){

        $validator =  Validator::make($request->all(),[
            'name' => 'required',
            'fecha_de_incripcion' => 'required',
            'fecha_inicio_contrato' => 'required',
            'fecha_final_contrato' => 'required',
            'fecha_nacimiento' => 'required',
            'activo' => 'required',
            'edad' => 'required',
            'genero' => 'required',
            'id_plan_servicio' => 'required',
            'nombre_empresa' => 'required',
            'id_usuario_administrador' => 'required',
        ]);

        //if it's fail
        if($validator->fails()){
            $data = [
                'message' => 'Error in data validation',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data,400);
        }

        //if it's created
        $usuario = Users_model::create([
                'name' => $request->name,
                'fecha_de_incripcion' => $request->fecha_de_incripcion,
                'fecha_inicio_contrato' => $request->fecha_inicio_contrato,
                'fecha_final_contrato'=> $request->fecha_final_contrato,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'activo'=> $request->activo,
                'edad'=>$request->edad,
                'genero'=>$request->genero,
                'id_plan_servicio'=>$request->id_plan_servicio,
                'nombre_empresa'=>$request->nombre_empresa,
                'id_usuario_administrador' => $request->id_usuario_administrador
            ]

        );

        //when can't create group task
        if(!$usuario){
            $data = [
                'message' => 'Error while creating usuario',
                'status' => 500
            ];
            return response()->json($data,500);
        }

        //when create group task successfully
        $data = [
            'usuario' => $usuario,
            'status' => 201
        ];

        return response()->json($data,201);

    }

    public function update(Request $request, $id){
        $user = Users_model::find($id);
        if(!$user){
            $data = [
                'message' => 'User not found',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator =  Validator::make($request->all(),[
            'name' => 'required',
            'fecha_de_incripcion' => 'required',
            'fecha_inicio_contrato' => 'required',
            'fecha_final_contrato' => 'required',
            'fecha_nacimiento' => 'required',
            'activo' => 'required',
            'edad' => 'required',
            'genero' => 'required',
            'id_plan_servicio' => 'required',
            'nombre_empresa' => 'required',
            'id_usuario_administrador' => 'required',
        ]);

        //if it's fail
        if($validator->fails()){
            $data = [
                'message' => 'Error in data validation',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data,400);
        }

        $user->name = $request->name;
        $user->fecha_de_incripcion = $request->fecha_de_incripcion;
        $user->fecha_inicio_contrato = $request->fecha_inicio_contrato;
        $user->fecha_final_contrato = $request->fecha_final_contrato;
        $user->fecha_nacimiento = $request->fecha_nacimiento;
        $user->activo = $request->activo;
        $user->edad = $request->edad;
        $user->genero = $request->genero;
        $user->id_plan_servicio = $request->id_plan_servicio;
        $user->nombre_empresa = $request->nombre_empresa;
        $user->id_usuario_administrador = $request->id_usario_administrador;

        $user->save();

        $data = [
            'usuario' => $user,
            'status' => 201
        ];

        return response()->json($data,201);





    }

    public function destroy($id){
        $user = Users_model::find($id);
        if(!$user){
            $data = [
                'message' => 'User not found',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $user->delete();

        $data = [
            'usuario' => $user,
            'message' => "User deleted successfully",
            'status' => 200
        ];
        return response()->json($data,200);

    }


}
