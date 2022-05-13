<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\QuienesSomosTraits;

class QuienesSomos extends Model
{
    use HasFactory,
        QuienesSomosTraits;
    protected $fillable = ['logo', 'titulo', 'contenido', 'tipo'];
}
