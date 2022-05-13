<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Translation;
use App\Models\Marcas;
use App\Mail\Consulta;
use Illuminate\Http\Request;
use App\Models\Logos;
use App\Models\Script;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use stdClass;

class ContactoController extends Controller
{
    public function index(){
        $sliders = Slider::where('pagina', 'contacto')
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
        return view('contacto', compact('sliders', 'marcas', 'logoIconoFutura', 'scriptsHeader', 'scriptsBody'));
    }

    public function enviarConsulta(Request $request){
        $messages =[
            'g-recaptcha-response.required'=>'El captcha es requerido'
        ];
        $request->validate([
            'g-recaptcha-response' => 'required|captcha',
        ],$messages);

        $usuario=new \stdClass();
        $usuario->Nombre=$request->nombreContacto . $request->apellidoContacto;
        $usuario->Email=$request->emailContacto;
        $usuario->Msg=$request->mensajeContacto;
        
        
        $mail=new Consulta($usuario);
        $obj= new \stdClass();
        $obj->respuesta=false;
        Mail::to('eduardoramallo@futura.com.ar')->send($mail);
        if (count(Mail::failures()) > 0){
            $obj->respuesta=true;
            return back()->with('error',"ALGO");
        }else{
            return redirect('/gracias');
        }

    }
}
