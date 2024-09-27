<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users_model extends Model
{
    public $timestamps = false; // Esto desactiva el manejo automático de timestamps
    use HasFactory;
    protected $table = 'users';

    protected $fillable = [
        "id",
        "name",
        "fecha_de_incripcion",
        "fecha_inicio_contrato",
        "fecha_final_contrato",
        "fecha_nacimiento",
        "activo",
        "edad",
        "genero",
        "id_plan_servicio",
        "nombre_empresa",
        "id_usuario_administrador",

    ];


}

