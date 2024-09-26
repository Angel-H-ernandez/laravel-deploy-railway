<?php

namespace App\Http\Controllers;

use App\Models\User_administrador_model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class User_administrador_controller extends Controller
{

    public function login(Request $request){

        $validator = Validator::make($request->all(), [
            'correo' => 'required|string|email|max:255',
            'password' => 'required|string|min:3',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User_administrador_model::where('correo', $request->correo)
            ->where('password', $request->password)
            ->first();

        if(!$user){
            $data = [
                'login' => false,
                'status' => 401,
            ];
            return response()->json($data, 401);
        }

        $data = [
            'login' => true,
            'status' => 200,
        ];

        return response()->json($data, 200);
    }
}
