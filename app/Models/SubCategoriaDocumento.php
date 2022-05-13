<?php

namespace App\Models;

use App\Models\Traits\SubCategoriasDocumentoTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoriaDocumento extends Model
{
    use HasFactory,SubCategoriasDocumentoTrait;
    protected $guarded=['id'];
    public function categoria(){
        return $this->belongsTo('App\Models\CategoriaDocumento','category_id');
    }
    public function documentos(){
        return $this->hasMany('App\Models\Documento','subcategory_id');
    }
}
