<?php

use App\Http\Controllers\Area_producto_controller;
use App\Http\Controllers\Cliente_controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users_controller;
use App\Http\Controllers\User_administrador_controller;
use App\Http\Controllers\Permisos_plan_controller;
use App\Http\Controllers\Permisos_subusuario_controller;
use App\Http\Controllers\Plan_servicio_controller;
use App\Http\Controllers\Sucursal_controller;
use App\Http\Controllers\Almacen_controller;
use App\Http\Controllers\Area_trabajador_controller;
use App\Http\Controllers\Rol_subusuario_controller;

Route::get('/version', function(){
    return "api 1.0";
});

