<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan_servicio_model extends Model
{
    public$timestamps = false;
    use HasFactory;
    protected $table = 'plan_servicio';

    protected $fillable = [
        "nombre",
        "precio",
        "periodo",
        "id_permiso_plan"
    ];
}
