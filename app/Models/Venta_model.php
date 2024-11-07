<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta_model extends Model
{
    use HasFactory;
    protected $table = "venta";
    public $timestamps = false;

    protected $fillable = [
        "id",
        "id_cliente",
        "fecha",
        "monto",
        "id_sucursal",
        "id_trabajador",
        "id_usuario",
    ];
}
