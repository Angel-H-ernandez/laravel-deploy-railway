<?php

use App\Http\Controllers\Area_producto_controller;
use App\Http\Controllers\Cliente_controller;
use App\Http\Controllers\Compra_controller;
use App\Http\Controllers\Producto_controller;
use App\Http\Controllers\Provedor_controller;
use App\Http\Controllers\Trabajador_controller;
use App\Http\Controllers\Venta_controller;
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
    return "api 2.3 \n desarrollador: Miguel angel Hernandez";
});

//LOGIN___________________________________________________________
Route::post('/login', [login_controller::class, 'login']);

//SUCURSAL__________________________________
Route::get('/get-sucursal/{id}', [Sucursal_controller::class, 'show']);
Route::put('/update-sucursal/{id}', [Sucursal_controller::class, 'update']);
Route::get('/list-sucursales/{id_usuario}', [Sucursal_controller::class, 'index']);
Route::post('/create-sucursal', [Sucursal_controller::class, 'store']);
Route::delete('/delete-sucursal/{id}', [Sucursal_controller::class, 'destroy']);

//AREA_PRODUCTO_____________________________________________________________________-
Route::get('/list-areas-productos/{id_usuario}', [Area_producto_controller::class, 'index']);
Route::post('/create-area-producto', [Area_producto_controller::class, 'store']);
Route::put('/update-area-producto/{id}', [Area_producto_controller::class, 'update']);
Route::delete('/delete-area-producto/{id}', [Area_producto_controller::class, 'delete']);
Route::get('/get-area-producto/{id}', [Area_producto_controller::class, 'show']);

//AREA_TRABAJADOR________________________________________________
Route::get('/list-areas-trabajador/{id_usuario}', [Area_trabajador_controller::class, 'index']);
Route::post('/create-area-trabajador', [Area_trabajador_controller::class, 'store']);
Route::put('/update-area-trabajador/{id}', [Area_trabajador_controller::class, 'update']);
Route::delete('/delete-area-trabajador/{id}', [Area_trabajador_controller::class, 'delete']);

//CLIENTES____________________________________________________________________
Route::get('/list-clientes/{id_usuario}', [Cliente_controller::class, 'index']);
Route::post('/create-cliente', [Cliente_controller::class, 'store']);
Route::put('/update-cliente/{id}', [Cliente_controller::class, 'update']);
Route::delete('/delete-cliente/{id}', [Cliente_controller::class, 'delete']);
Route::get('/get-cliente/{id}', [Cliente_controller::class, 'show']);

//PRODUCTOS__________________________________________________________________
Route::get('/list-productos/{id_usuario}', [Producto_controller::class, 'index']);
Route::put('/update-producto/{id}', [Producto_controller::class, 'update']);
Route::post('/create-producto', [Producto_controller::class, 'store']);
Route::delete('/delete-producto/{id}', [Producto_controller::class, 'delete']);
Route::get('/get-producto/{id}', [Producto_controller::class, 'show']);

//TRABAJADOR__________________________________________________________________
Route::get('/list-trabajadores/{id}', [Trabajador_controller::class, 'index']);
Route::put('/update-trabajador/{id}', [Trabajador_controller::class, 'update']);
Route::post('/create-trabajador', [Trabajador_controller::class, 'store']);
Route::delete('/delete-trabajador/{id}', [Trabajador_controller::class, 'delete']);
Route::get('/get-trabajador/{id}', [Trabajador_controller::class, 'show']);

//PROVEDORES
Route::get('/list-provedores/{id}', [Provedor_controller::class, 'index']);
Route::post('/create-provedor/{id}', [Provedor_controller::class, 'store']);
Route::put('/update-provedor/{id}', [Provedor_controller::class, 'update']);
Route::delete('/delete-provedor/{id}', [Provedor_controller::class, 'delete']);
Route::get('/get-provedor/{id}', [Provedor_controller::class, 'show']);

//COMPRAS______________________________________________________-
Route::get('/list-compras/{id}', [Compra_controller::class, 'index']);
Route::put('/update-compra/{id}', [Compra_controller::class, 'update']);
Route::post('/create-compra/{id}', [Compra_controller::class, 'store']);
Route::delete('/delete-compra/{id}', [Compra_controller::class, 'delete']);

//VENTAS______________________________________________________-
Route::get('/list-ventas/{id}', [Venta_controller::class, 'index']);
Route::post('/create-venta', [Venta_controller::class, 'store']);
Route::delete('/delete-venta/{id}', [Venta_controller::class, 'delete']);
Route::put('/update-venta/{id}', [Venta_controller::class, 'update']);


/*//ROL_SUBUSUARIO______________________________________________
Route::get('list-roles-subusuario/{id_usuario}', [Rol_subusuario_controller::class, 'index']);
Route::post('/create-rol-subusuario', [Rol_subusuario_controller::class, 'store']);
Route::put('update-rol-subusuario/{id}', [Rol_subusuario_controller::class, 'update']);*/

/*//ALMACEN___________________________________________________________________________________________
Route::get('/list-almacenes/{id_usuario}', [Almacen_controller::class, 'index']);
Route::post('/create-almacen', [Almacen_controller::class, 'store']);
Route::put('/update-almacen/{id}', [Almacen_controller::class, 'update']);*/

/*//PERMISOS_PLAN______________________________________________________________
//PERMISOS_PLAN______________________________________________________________
Route::get('/show-permisos-plan/{id}', [Permisos_plan_controller::class, 'show']);
Route::put('/update-permisos-plan/{id}', [Permisos_plan_controller::class, 'update']);*/

/*//PERMISOS SUBUSUARIO____________________________________________---____________
Route::get('/get-permisos-subusuario/{id}', [Permisos_subusuario_controller::class, 'get']);
Route::put('/update-permisos-subusuario/{id}', [Permisos_subusuario_controller::class, 'update']);*/

/*//PLAN SERVICIO ___________________________________________________________________
Route::get('/get-plan-servicio/{id}', [Plan_servicio_controller::class, 'get']);
Route::put('/update-plan-servicio/{id}', [Plan_servicio_controller::class, 'update']);*/

/*//USERS____________________________________________________________________
Route::get('/list-users', [Users_controller::class, 'index']);
Route::post('/create-user', [Users_controller::class, 'store']);
Route::put('/update-user/{id}', [Users_controller::class, 'update']);
Route::delete('/delete-user/{id}', [Users_controller::class, 'destroy']);
Route::get('/get-user/{id}', [Users_controller::class, 'show']);*/

/*
 * <?php

// En api.php
Route::group([
    'middleware' => ['auth:api', 'checkRole:admin'],
    'prefix' => 'admin'
], function () {
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/products', [ProductController::class, 'store']);
    // ... más rutas protegidas
});

// Ejemplo de un middleware personalizado (app/Http/Middleware/CheckRole.php)
namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        if (!$request->user() || !$request->user()->hasRole($role)) {
            return response()->json(['error' => 'No autorizado'], 403);
        }

        return $next($request);
    }
}*/


/*// Puedes simplemente usar:
Route::apiResource('products', ProductController::class);

// Esto creará automáticamente las siguientes rutas:
// GET    /api/products          -> index()   -> Lista todos los productos
// POST   /api/products          -> store()   -> Crea un nuevo producto
// GET    /api/products/{id}     -> show()    -> Muestra un producto
// PUT    /api/products/{id}     -> update()  -> Actualiza un producto
// DELETE /api/products/{id}     -> destroy() -> Elimina un producto

// También puedes especificar solo algunas acciones:
Route::apiResource('products', ProductController::class)->only([
    'index', 'show'
]);

// O excluir algunas acciones:
Route::apiResource('products', ProductController::class)->except([
    'destroy'
]);

// Controller correspondiente
namespace App\Http\Controllers;

class ProductController extends Controller
{
    public function index()
    {
        // Retorna lista de productos
        return Product::all();
    }

    public function store(Request $request)
    {
        // Crea un nuevo producto
        return Product::create($request->validated());
    }

    public function show($id)
    {
        // Muestra un producto específico
        return Product::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        // Actualiza un producto
        $product = Product::findOrFail($id);
        $product->update($request->validated());
        return $product;
    }

    public function destroy($id)
    {
        // Elimina un producto
        Product::findOrFail($id)->delete();
        return response()->json(null, 204);
    }*/
