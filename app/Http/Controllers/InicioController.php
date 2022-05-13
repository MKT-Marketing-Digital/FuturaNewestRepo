<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Marcas;
use App\Models\Translation;
use App\Models\Logos;
use App\Models\Script;
use App\Mail\Consulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use stdClass;

class InicioController extends Controller
{
    public function index(){
        $sliders = Slider::where('pagina', 'inicio')
        ->orderby('orden',"ASC")
        ->get();
        $marcas = Marcas::orderby('id', "ASC")
        ->get();
        $logoPopUp = Logos::where('descripcion', 'popup')
        ->first();
        $logoIconoFutura = Logos::where('descripcion', 'logo nav bar')
        ->first();
        $scriptsHeader = Script::where('seccion', 'header')
        ->get();
        $scriptsBody = Script::where('seccion', 'body')
        ->get();
        return view('inicio', compact('sliders', 'marcas', 'logoPopUp', 'logoIconoFutura', 'scriptsHeader', 'scriptsBody'));
    }

    public function enviarConsulta(Request $request){
        // biscolab/laravel-recaptcha

        $usuario=new \stdClass();
        $usuario->Nombre=$request->nombreContacto . $request->apellidoContacto;
        $usuario->Email=$request->emailContacto;
        $usuario->Msg=$request->mensajeContacto;
        
        
        $mail=new Consulta($usuario);
        $obj= new \stdClass();
        $obj->respuesta=false;
        Mail::to('mariafagnola@futura.com.ar')->send($mail);
        if (count(Mail::failures()) > 0){
            $obj->respuesta=true;
            return back()->with('error');
        }else{
            return redirect('/gracias');
        }

    }
}