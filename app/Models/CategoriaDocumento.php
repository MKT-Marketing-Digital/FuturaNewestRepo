<?php

namespace App\Models;

use App\Models\Traits\CategoriasDocumentoTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaDocumento extends Model
{
    use HasFactory,CategoriasDocumentoTrait;
    protected $guarded=['id'];
    public function subcategorias(){
        return $this->hasMany('App\Models\SubCategoriaDocumento','category_id');
    }
    public function documentos(){
        return $this->hasMany('App\Models\Documento','category_id');
    }
}
