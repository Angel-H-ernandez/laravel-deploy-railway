<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_administrador_model extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = "usuario_administrador";
    protected $fillable = [
        'nombre',
        'correo',
        'password',
    ];
}
