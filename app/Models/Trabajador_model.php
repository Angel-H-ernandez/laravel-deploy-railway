<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajador_model extends Model
{
    public $timestamps = false; // Esto desactiva el manejo automático de timestamps
    use HasFactory;
    protected $table = 'trabajador';

    protected $fillable = [
        "id",
        "nombre",
        "telefono",
        "email",
        "id_usuario",
        "id_sucursal",
        "id_area_trabajador",
        "sueldo",
        "cuenta_bancaria",
        "periodo_de_pago",
        "password"
    ];
}
