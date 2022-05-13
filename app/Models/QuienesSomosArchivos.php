<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuienesSomosArchivos extends Model
{
    use HasFactory;
    protected $fillable = ['orden', 'archivo', 'nombre'];
}
