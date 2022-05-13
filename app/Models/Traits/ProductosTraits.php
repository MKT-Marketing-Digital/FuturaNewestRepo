<?php

namespace App\Models\Traits; 

use App\Traits\Translation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
trait ProductosTraits
{
    use Translation; 

	public function getTituloAttribute($value){
        return $this->translate('titulo', $value); 
    }
    public function getTextoAttribute($value){
        return $this->translate('texto', $value);
    }

}