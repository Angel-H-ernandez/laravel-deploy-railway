<?php



use App\Http\Controllers\Area_producto_controller;
use App\Http\Controllers\Cliente_controller;
use App\Http\Controllers\Compra_controller;
use App\Http\Controllers\Producto_controller;
use App\Http\Controllers\Provedor_controller;
use App\Http\Controllers\Trabajador_controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users_controller;
use App\Http\Controllers\login_controller;
use App\Http\Controllers\Permisos_plan_controller;
use App\Http\Controllers\Permisos_subusuario_controller;
use App\Http\Controllers\Plan_servicio_controller;
use App\Http\Controllers\Sucursal_controller;
use App\Http\Controllers\Almacen_Controller;
use App\Http\Controllers\Area_trabajador_controller;
use App\Http\Controllers\Rol_subusuario_controller;


Route::get('/', function(){
    return "api 1.7 \n desarrollador: Miguel angel Hernandez";
});

//LOGIN___________________________________________________________
Route::post('/login', [login_controller::class, 'login']);

//USERS____________________________________________________________________
Route::get('/list-users', [Users_controller::class, 'index']);
Route::post('/create-user', [Users_controller::class, 'store']);
Route::put('/update-user/{id}', [Users_controller::class, 'update']);
Route::delete('/delete-user/{id}', [Users_controller::class, 'destroy']);
Route::get('/get-user/{id}', [Users_controller::class, 'show']);

//PERMISOS_PLAN______________________________________________________________
Route::get('/show-permisos-plan/{id}', [Permisos_plan_controller::class, 'show']);
Route::put('/update-permisos-plan/{id}', [Permisos_plan_controller::class, 'update']);

//PERMISOS SUBUSUARIO____________________________________________---____________
Route::get('/get-permisos-subusuario/{id}', [Permisos_subusuario_controller::class, 'get']);
Route::put('/update-permisos-subusuario/{id}', [Permisos_subusuario_controller::class, 'update']);

//PLAN SERVICIO ___________________________________________________________________
Route::get('/get-plan-servicio/{id}', [Plan_servicio_controller::class, 'get']);
Route::put('/update-plan-servicio/{id}', [Plan_servicio_controller::class, 'update']);

//SUCURSAL__________________________________
Route::get('/get-sucursal/{id}', [Sucursal_controller::class, 'show']);
Route::put('/update-sucursal/{id}', [Sucursal_controller::class, 'update']);
Route::get('/list-sucursal/{id_usuario}', [Sucursal_controller::class, 'index']);
Route::post('/create-sucursal', [Sucursal_controller::class, 'store']);
Route::delete('/delete-sucursal/{id}', [Sucursal_controller::class, 'destroy']);

//ALMACEN___________________________________________________________________________________________
Route::get('/get-almacenes/{id_usuario}', [Almacen_controller::class, 'index']);
Route::post('/create-almacen', [Almacen_controller::class, 'store']);
Route::put('/update-almacen/{id}', [Almacen_controller::class, 'update']);

//AREA_PRODUCTO_____________________________________________________________________-
Route::get('/list-areas-productos/{id_usuario}', [Area_producto_controller::class, 'index']);
Route::post('/create-area-producto', [Area_producto_controller::class, 'store']);
Route::put('/update-area-producto/{id}', [Area_producto_controller::class, 'update']);
Route::delete('/delete-area-producto/{id}', [Area_producto_controller::class, 'delete']);

//AREA_TRABAJADOR________________________________________________
Route::get('/list-areas-trabajador/{id_usuario}', [Area_trabajador_controller::class, 'index']);
Route::post('/create-area-trabajador', [Area_trabajador_controller::class, 'store']);
Route::put('/update-area-trabajador/{id}', [Area_trabajador_controller::class, 'update']);
Route::delete('/delete-area-trabajador/{id}', [Area_trabajador_controller::class, 'delete']);

//ROL_SUBUSUARIO______________________________________________
Route::get('list-roles-subusuario/{id_usuario}', [Rol_subusuario_controller::class, 'index']);
Route::post('/create-rol-subusuario', [Rol_subusuario_controller::class, 'store']);
Route::put('update-rol-subusuario/{id}', [Rol_subusuario_controller::class, 'update']);

//CLIENTES____________________________________________________________________
Route::get('/list-clientes/{id_usuario}', [Cliente_controller::class, 'index']);
Route::post('/create-cliente', [Cliente_controller::class, 'store']);
Route::put('/update-cliente/{id}', [Cliente_controller::class, 'update']);
Route::delete('/delete-cliente/{id}', [Cliente_controller::class, 'delete']);


//PRODUCTOS__________________________________________________________________
Route::get('/list-productos/{id_usuario}', [Producto_controller::class, 'index']);
Route::put('/update-producto/{id}', [Producto_controller::class, 'update']);
Route::post('/create-producto', [Producto_controller::class, 'store']);
Route::delete('/delete-producto/{id}', [Producto_controller::class, 'delete']);

//TRABAJADOR__________________________________________________________________
Route::get('/list-trabajadores/{id}', [Trabajador_controller::class, 'index']);
Route::put('/update-trabajador/{id}', [Trabajador_controller::class, 'update']);
Route::post('/create-trabajador', [Trabajador_controller::class, 'store']);
Route::delete('/delete-trabajador/{id}', [Trabajador_controller::class, 'delete']);

//PROVEDORES
Route::get('/list-provedores/{id}', [Provedor_controller::class, 'index']);
Route::post('/create-provedor/{id}', [Provedor_controller::class, 'store']);
//EDTAR
//ELIMINAR

//COMPRAS______________________________________________________-
Route::get('/list-compras/{id}', [Compra_controller::class, 'index']);
//Route::put('/update-compra/{id}', [Compra_controller::class, 'update']);
Route::post('/create-compra/{id}', [Compra_controller::class, 'store']);
//Route::delete('/delete-compra/{id}', [Compra_controller::class, 'delete']);

