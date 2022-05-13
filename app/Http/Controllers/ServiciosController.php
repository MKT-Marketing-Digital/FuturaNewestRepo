<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Servicios;
use App\Models\Translation;
use App\Models\Logos;
use App\Models\Script;
use App\Models\Marcas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; 


class ServiciosController extends Controller
{

    public function index(){
        $checks = Servicios::where('seccion', 'check')
        ->get();
        foreach($checks as $check){
            $checkContenidoIngles =  Translation::where('table', 'servicios')
            ->where('column', 'contenido')
            ->where('locale', 'en')
            ->where('row_id', $check->id)
            ->first();
            $check->contenido_en = $checkContenidoIngles->texto;
            $checkContenidoPortugues =  Translation::where('table', 'servicios')
            ->where('column', 'contenido')
            ->where('locale', 'pt')
            ->where('row_id', $check->id)
            ->first();
            $check->contenido_pt = $checkContenidoPortugues->texto;
        }
        //
        $antes_despues = Servicios::where('seccion', 'antes_despues')
        ->first();
        
        $se_incluye = Servicios::where('seccion', 'se_incluye')
        ->first();
        $incluyeTituloInlges =  Translation::where('table', 'servicios')
        ->where('column', 'titulo')
        ->where('locale', 'en')
        ->where('row_id', $se_incluye->id)
        ->first();
        $se_incluye->titulo_en = $incluyeTituloInlges->texto;
        $incluyeTituloPortugues =  Translation::where('table', 'servicios')
        ->where('column', 'titulo')
        ->where('locale', 'pt')
        ->where('row_id', $se_incluye->id)
        ->first();
        $se_incluye->titulo_pt = $incluyeTituloPortugues->texto;
        //

        $mantenimientos = Servicios::where('seccion', 'mantenimiento')
        ->get();
        foreach($mantenimientos as $mantenimiento){
            $mantenimientoContenidoIngles =  Translation::where('table', 'servicios')
            ->where('column', 'contenido')
            ->where('locale', 'en')
            ->where('row_id', $mantenimiento->id)
            ->first();
            $mantenimiento->contenido_en = $mantenimientoContenidoIngles->texto;
            $mantenimientoContenidoPortugues =  Translation::where('table', 'servicios')
            ->where('column', 'contenido')
            ->where('locale', 'pt')
            ->where('row_id', $mantenimiento->id)
            ->first();
            $mantenimiento->contenido_pt = $mantenimientoContenidoPortugues->texto;
            $mantenimientoTituloInlges =  Translation::where('table', 'servicios')
            ->where('column', 'titulo')
            ->where('locale', 'en')
            ->where('row_id', $mantenimiento->id)
            ->first();
            $mantenimiento->titulo_en = $mantenimientoTituloInlges->texto;
            $mantenimientoTituloPortugues =  Translation::where('table', 'servicios')
            ->where('column', 'titulo')
            ->where('locale', 'pt')
            ->where('row_id', $mantenimiento->id)
            ->first();
            $mantenimiento->titulo_pt = $mantenimientoTituloPortugues->texto;
        }
        //
        $cards = Servicios::where('seccion', 'card')
        ->get();
        foreach($cards as $card){
            $cardContenidoIngles =  Translation::where('table', 'servicios')
            ->where('column', 'contenido')
            ->where('locale', 'en')
            ->where('row_id', $card->id)
            ->first();
            $card->contenido_en = $cardContenidoIngles->texto;
            $cardContenidoPortugues =  Translation::where('table', 'servicios')
            ->where('column', 'contenido')
            ->where('locale', 'pt')
            ->where('row_id', $card->id)
            ->first();
            $card->contenido_pt = $cardContenidoPortugues->texto;
            $cardTituloInlges =  Translation::where('table', 'servicios')
            ->where('column', 'titulo')
            ->where('locale', 'en')
            ->where('row_id', $card->id)
            ->first();
            $card->titulo_en = $cardTituloInlges->texto;
            $cardTituloPortugues =  Translation::where('table', 'servicios')
            ->where('column', 'titulo')
            ->where('locale', 'pt')
            ->where('row_id', $card->id)
            ->first();
            $card->titulo_pt = $cardTituloPortugues->texto;
        }
        //

        return view('admin.servicios', compact('checks', 'antes_despues', 'se_incluye', 'mantenimientos', 'cards'));
    }

    public function vista(){
        $sliders = Slider::where('pagina', 'servicios')
        ->orderby('orden',"ASC")
        ->get();
        $marcas = Marcas::orderby('id', "ASC")
        ->get();
        $checks = Servicios::where('seccion', 'check')
        ->get();
        $antes_despues = Servicios::where('seccion', 'antes_despues')
        ->first();
        $se_incluye = Servicios::where('seccion', 'se_incluye')
        ->first();
        $mantenimientos = Servicios::where('seccion', 'mantenimiento')
        ->get();
        $cards = Servicios::where('seccion', 'card')
        ->get();
        $logoIconoFutura = Logos::where('descripcion', 'logo nav bar')
        ->first();
        $scriptsHeader = Script::where('seccion', 'header')
        ->get();
        $scriptsBody = Script::where('seccion', 'body')
        ->get();
        return view('servicios', compact('sliders', 'marcas', 'checks', 'antes_despues', 'se_incluye', 'mantenimientos', 'cards', 'logoIconoFutura', 'scriptsHeader', 'scriptsBody'));
    }

    public function obtenerTraduccionTitulo($servicio, $locale){
        $traduccion=Translation::where('table','servicios')
        ->where('column','titulo')
        ->where('row_id',$servicio->id)
        ->where('locale', $locale)
        ->first();       
        return $traduccion;
    }
    public function obtenerTraduccionContenido($servicio, $locale){
        $traduccion=Translation::where('table','servicios')
        ->where('column','contenido')
        ->where('row_id',$servicio->id)
        ->where('locale', $locale)
        ->first();       
        return $traduccion;
    }

    public function agregarServicio(Request $request){
        $servicio = new Servicios();
        if($servicio->titulo){
            $servicio->titulo = $request->titulo;
        }
        if($servicio->contenido){
            $servicio->contenido = $request->contenido;
        }
        if($request->has('imagen')){
            $servicio->imagen = $request->file('imagen')->store('images/servicios');
        }
        $servicio->save();
        if($request->titulo_en){
            Translation::create([
                'table'=>'servicios',
                'column'=>'titulo',
                'row_id'=>$servicio->id,
                'locale'=>'en',
                'texto'=>$request->titulo_en,
                ]);
        }
        if($request->titulo_pt){
            Translation::create([
                'table'=>'servicios',
                'column'=>'titulo',
                'row_id'=>$servicio->id,
                'locale'=>'pt',
                'texto'=>$request->titulo_pt,
                ]);
        }
        if($request->contenido_en){
            Translation::create([
                'table'=>'servicios',
                'column'=>'contenido',
                'row_id'=>$servicio->id,
                'locale'=>'en',
                'texto'=>$request->titulo_en,
                ]);
        }
        if($request->contenido_pt){
            Translation::create([
                'table'=>'servicios',
                'column'=>'contenido',
                'row_id'=>$servicio->id,
                'locale'=>'pt',
                'texto'=>$request->titulo_pt,
                ]);
        }
        $servicio->seccion = $request->seccion;
        return Redirect()->back()->with('success', 'El Servicio se cargo con éxito.');
    }

    public function editarServicio($id){
        $servicio= Servicios::findorFail($id);
        $titulo_en=$this->obtenerTraduccionTitulo($servicio, 'en');
        if($titulo_en->texto){
            $servicio->titulo_en=$titulo_en->texto;
        }
        $titulo_pt=$this->obtenerTraduccionTitulo($servicio, 'pt');
        if($titulo_pt->texto){
            $servicio->titulo_pt=$titulo_pt->texto;
        }
        $contenido_en=$this->obtenerTraduccionContenido($servicio, 'en');
        if($contenido_en->texto){
            $servicio->contenido_en=$contenido_en->texto;
        }
        $contenido_pt=$this->obtenerTraduccionContenido($servicio, 'pt');
        if($contenido_pt->texto){
            $servicio->contenido_pt=$contenido_pt->texto;
        }

        return $servicio; 
    }

    public function actualizarServicio(Request $request){
        $servicio= Servicios::findorFail($request->id_editar);
        if($request->hasFile('imagen')){
            if($servicio->imagen){
                Storage::delete($servicio->imagen);
            }
            $servicio->imagen=$request->file('imagen')->store('images/servicios');
        }
        if($request->titulo_en){
            $traduccion=$this->obtenerTraduccionTitulo($servicio, 'en');
            $traduccion->texto=$request->titulo_en;
            $traduccion->update();
        }
        if($request->titulo_pt!=null || $request->titulo_pt!=''){
            $traduccion_pt=$this->obtenerTraduccionTitulo($servicio, 'pt');
            $traduccion_pt->texto=$request->titulo_pt;
            $traduccion_pt->update();
        }
        if($request->titulo){
            $servicio->titulo = $request->titulo;
        }
        if($request->contenido){
            $servicio->contenido = $request->contenido;
        }
        if($request->contenido_en){
            $traduccion=$this->obtenerTraduccionContenido($servicio, 'en');
            $traduccion->texto=$request->contenido_en;
            $traduccion->update();
        }
        if($request->contenido_pt!=null || $request->contenido_pt!=''){
            $traduccion_pt=$this->obtenerTraduccionContenido($servicio, 'pt');
            $traduccion_pt->texto=$request->contenido_pt;
            $traduccion_pt->update();
        }
       $servicio->update(); 

       return Redirect()->back()->with('success', 'El Servicio se actualizo con éxito.');
       
    }

    public function elimiarServicio($id){
        $servicio= Servicios::find($id);
        if($servicio->imagen){
            Storage::delete($categoria->imagen);
        }
        if($servicio->titulo){
            $traduccion_en_titulo=$this->obtenerTraduccionTitulo($servicio, 'en');
            $traduccion_pt_titulo=$this->obtenerTraduccionTitulo($servicio, 'pt');
            if($traduccion_en_titulo){
                $traduccion_en_titulo->delete();
            }
            if($traduccion_pt_titulo){
                $traduccion_pt_titulo->delete();
            }
        }
        if($servicio->contenido){
            $traduccion_en_contenido=$this->obtenerTraduccionContenido($servicio, 'en');
            $traduccion_pt_contenido=$this->obtenerTraduccionContenido($servicio, 'pt');
            if($traduccion_en_contenido){
                $traduccion_en_contenido->delete();
            }
            if($traduccion_pt_contenido){
                $traduccion_pt_contenido->delete();
            }
        }

        $servicio->delete();
    }
}
