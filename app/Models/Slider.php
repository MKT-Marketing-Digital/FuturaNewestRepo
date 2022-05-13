<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\SliderTraits;

class Slider extends Model
{
    use HasFactory,
        SliderTraits;
    protected $fillable = [ 'imagen', 'orden', 'texto', 'pagina', 'locale'];
}
