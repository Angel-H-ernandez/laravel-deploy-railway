<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area_trabajador_model extends Model
{
    public $timestamps = false;
    protected $table = "area_trabajador";
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre',
        'id_usuario',
        'id_sucursal'

    ];
}
