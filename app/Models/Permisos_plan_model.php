<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permisos_plan_model extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = "permisos_plan";
    protected $fillable = [
        'id',
        'online',
        'multiusuario',
        'multisucursal',
        'visualizar',
        'vender',
        'comprar'
    ];
}
