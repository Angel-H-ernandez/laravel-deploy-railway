<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almacen_model extends Model
{
    public $timestamps = false;
    protected $table = "almacen";
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre',
        'id_usuario',
        'id_sucursal'
    ];
}