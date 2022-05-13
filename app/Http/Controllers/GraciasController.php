<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marcas;
use App\Models\Translation;
use App\Models\Logos;
use App\Models\Script;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GraciasController extends Controller
{
    public function index(){
        $logoIconoFutura = Logos::where('descripcion', 'logo nav bar')
        ->first();
        $scriptsHeader = Script::where('seccion', 'header')
        ->get();
        $scriptsBody = Script::where('seccion', 'body')
        ->get();
        $marcas = Marcas::orderby('id', "ASC")
        ->get();
        return view('gracias', compact('logoIconoFutura','scriptsHeader','scriptsBody','marcas'));
    }
}
