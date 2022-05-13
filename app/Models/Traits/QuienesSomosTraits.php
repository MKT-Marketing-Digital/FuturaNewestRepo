<?php

namespace App\Models\Traits; 

use App\Traits\Translation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

trait QuienesSomosTraits
{
    use Translation; 

	public function getTituloAttribute($value){
        return $this->translate('titulo', $value); 
    }
    public function getContenidoAttribute($value){
        return $this->translate('contenido', $value); 
    }

}