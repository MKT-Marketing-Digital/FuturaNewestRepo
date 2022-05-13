<?php

namespace App\Models;

use App\Models\Traits\DocumentosTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory,DocumentosTrait;
    
    protected $guarded=['id'];
    
    public function categoria(){
        return $this->belongsTo('App\Models\CategoriaDocumento','category_id');
    }
    public function subcategoria(){
        return $this->belongsTo('App\Models\SubCategoriaDocumento','subcategory_id');
    }
}
