<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\ServiciosTraits;

class Servicios extends Model
{
    use HasFactory,
        ServiciosTraits;
    protected $fillable = ['imagen', 'titulo', 'contenido', 'seccion'];
}
