<?php

namespace App\Http\Controllers;

use App\Models\Users_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Permisos_controller extends Controller
{
    public function show($id_user){
        // Usando Query Builder
        $permisos = DB::table('users as u')
            ->select('u.name', 'm.codigo as vista', 'm.nombre as nombre_vista', 'p.tiene_permiso')
            ->join('plan_servicio as ps', 'u.id_plan_servicio', '=', 'ps.id')
            ->join('permisos_plan as p', 'ps.id', '=', 'p.id_plan')
            ->join('modulos as m', 'p.id_modulo', '=', 'm.id')
            ->where('u.id', $id_user)
            ->orderBy('m.id')
            ->get();





        return response()->json([
            'success' => true,
            'data' => $permisos
        ]);
    }
}
