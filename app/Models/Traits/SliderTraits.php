<?php

namespace App\Models\Traits; 

use App\Traits\Translation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

trait SliderTraits
{
    use Translation; 

	public function getTextoAttribute($value){
        return $this->translate('texto', $value); 
    }

}