<?php

namespace App\Models\Traits; 

use App\Traits\Translation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

trait DocumentosTrait
{
    use Translation; 

	public function getNombreAttribute($value){
        return $this->translate('nombre', $value); 
    }

}