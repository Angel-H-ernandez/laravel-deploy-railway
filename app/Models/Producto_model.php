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

    // En el modelo Producto_model
    public function areaProducto()
    {
        return $this->belongsTo(Area_producto_model::class, 'id_area_producto', 'id');
    }
}
