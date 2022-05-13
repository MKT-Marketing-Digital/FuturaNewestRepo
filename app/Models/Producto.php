<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\ProductosTraits;

class Producto extends Model
{
    use HasFactory,
        ProductosTraits;
    protected $guarded=['id'];
    public function descargas(){
        return $this->hasMany('App\Models\ProductoDescarga','prod_id');
    }
    public function producto(){
        return $this->belongsTo('App\Models\productoCategorias','prod_id');
    }
}
