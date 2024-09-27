<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User_administrador_controller;


Route::get('/info', function(){
    return "api 1.0 \n desarrollador: Miguel angel Hernandez";
});

//LOGIN___________________________________________________________
Route::post('/login', [User_administrador_controller::class, 'login']);

