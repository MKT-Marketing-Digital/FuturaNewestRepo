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
use App\Models\QuienesSomos;
use App\Models\QuienesSomosArchivos;

class QuienesSomosController extends Controller
{
    public function index(){
        $sliders = Slider::where('pagina', 'quienes-somos')
        ->orderby('orden',"ASC")
        ->get();
        $marcas = Marcas::orderby('id', "ASC")
        ->get();
        $Mision = QuienesSomos::where('tipo', 'mision')
        ->first();
        $Vision = QuienesSomos::where('tipo', 'vision')
        ->first();
        $Valores = QuienesSomos::where('tipo', 'valores')
        ->first();
        $Calidad = QuienesSomos::where('tipo', 'calidad')
        ->first();
        $Politicas = QuienesSomos::where('tipo', 'politicas')
        ->first();
        $TituloArchivos = QuienesSomos::where('tipo', 'archivos')
        ->first();
        $Archivos = QuienesSomosArchivos::orderby('orden', "ASC")
        ->get();
        $Historia = QuienesSomos::where('tipo', 'historia')
        ->first();
        $Decadas = QuienesSomos::where('tipo', 'decada')
        ->orderby('id', "ASC")
        ->get();
        $logoIconoFutura = Logos::where('descripcion', 'logo nav bar')
        ->first();
        $scriptsHeader = Script::where('seccion', 'header')
        ->get();
        $scriptsBody = Script::where('seccion', 'body')
        ->get();
        return view('quienes-somos', compact('sliders', 'marcas', 'Mision', 'Vision', 'Valores', 'Calidad', 'Politicas', 'Archivos', 'TituloArchivos', 'Historia', 'Decadas', 'logoIconoFutura', 'scriptsHeader', 'scriptsBody'));
    }
}
