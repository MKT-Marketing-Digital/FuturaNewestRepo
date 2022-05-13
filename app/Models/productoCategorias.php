<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\ProductosTraits;

class productoCategorias extends Model
{
    use HasFactory,
        ProductosTraits;
    protected $fillable = ['orden', 'titulo', 'imagen', 'texto'];
    public function producto(){
        return $this->hasOne('App\Models\Producto','category_id');
    }
}
