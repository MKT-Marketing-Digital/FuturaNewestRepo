<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\ProductosDescargasTraits;

class ProductoDescarga extends Model
{
    use HasFactory,
        ProductosDescargasTraits;
    protected $guarded=['id'];
    public function producto(){
        return $this->belongsTo('App\Models\Producto','prod_id');
    }
}
