<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto_model extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'producto';

    protected $fillable = [
        'id',
        'nombre',
        'id_area_producto',
        'cantidad',
        'precio',
    ];
}
