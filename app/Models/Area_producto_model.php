<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area_producto_model extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'area_producto';

    protected $fillable = [
        'id',
        'nombre',
        'id_sucursal',
        'id_usuario',
        'id_almacen'

    ];
}
