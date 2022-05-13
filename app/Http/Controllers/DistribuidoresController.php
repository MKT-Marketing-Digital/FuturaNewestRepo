<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Translation;
use App\Models\Marcas;
use App\Models\Logos;
use App\Models\Script;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; 

class DistribuidoresController extends Controller
{
    public function index(){
        $sliders = Slider::where('pagina', 'distribuidores')
        ->orderby('orden',"ASC")
        ->get();
        $marcas = Marcas::orderby('id', "ASC")
        ->get();
        $logoIconoFutura = Logos::where('descripcion', 'logo nav bar')
        ->first();
        $scriptsHeader = Script::where('seccion', 'header')
        ->get();
        $scriptsBody = Script::where('seccion', 'body')
        ->get();
        return view('distribuidores', compact('sliders', 'marcas', 'logoIconoFutura', 'scriptsHeader', 'scriptsBody'));
    }
}
