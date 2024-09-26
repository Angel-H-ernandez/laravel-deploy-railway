<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User_administrador_controller;


Route::get('/version', function(){
    return "api 1.0";
});

//LOGIN___________________________________________________________
Route::post('/login', [User_administrador_controller::class, 'login']);

