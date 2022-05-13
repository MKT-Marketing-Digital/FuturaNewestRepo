<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Translation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; 

class SliderController extends Controller
{
    public function index($pagina){
        $sliders = Slider::where('pagina', $pagina)
        ->orderby('orden',"ASC")
        ->get();

        return view('admin.slider', compact('sliders'));
    }

    public function obtenerTraduccion($slider, $locale){
        $traduccion=Translation::where('table','sliders')
        ->where('column','texto')
        ->where('row_id',$slider->id)
        ->where('locale', $locale)
        ->first();       
        return $traduccion;
    }

    
    public function AgregarSlider(Request $request){
        $slider= new Slider();
        $slider->orden=$request->slider_orden;
        $slider->texto=$request->descripcion_es;
        $slider->pagina=$request->pagina;
        $slider->locale='es';
        if($request->has('imagen_slider')){
            $slider->imagen=$request->file('imagen_slider')->store('images/sliders');
        }
    	if($request->has('imagen_slider_ingles')){
            $slider->imagen_ingles=$request->file('imagen_slider_ingles')->store('images/sliders');
        }
    	if($request->has('imagen_slider_portugues')){
            $slider->imagen_portugues=$request->file('imagen_slider_portugues')->store('images/sliders');
        }
        $slider->save();
        $textoIngles= $request->descripcion_en;
        if($textoIngles){
            Translation::create([
                'table'=>'sliders',
                'column'=>'texto',
                'row_id'=>$slider->id,
                'locale'=>'en',
                'texto'=>$textoIngles,
                ]);
            }
            if($request->descripcion_pt){
                Translation::create([
                    'table'=>'sliders',
                    'column'=>'texto',
                    'row_id'=>$slider->id,
                    'locale'=>'pt',
                    'texto'=>$request->descripcion_pt,
                    ]);
                }
        return Redirect()->back()->with('success', 'El Slider se cargo con éxito.');
    }
    public function EliminarSlider($pagina, $id){
        $slider= Slider::find($id);
        Storage::delete($slider->imagen);
    	Storage::delete($slider->imagen_ingles);
    	Storage::delete($slider->imagen_portugues);
        $traduccion_en=$this->obtenerTraduccion($slider, 'en');
        $traduccion_pt=$this->obtenerTraduccion($slider, 'pt');
        if($traduccion_en){
            $traduccion_en->delete();
        }
        if($traduccion_pt){
            $traduccion_pt->delete();
        }
        $slider->delete();
    }
            
    public function EditarSlider($pagina, $id){
        $slider= Slider::findorFail($id);
        $descingles=$this->obtenerTraduccion($slider, 'en');
        // if($slider->descripcion_en){
        //     $slider->descripcion_en=$descingles->texto;
        // }
        $descpt=$this->obtenerTraduccion($slider, 'pt');
        // if($slider->descripcion_pt){
        //     $slider->descripcion_pt=$descpt->texto;
        // }
       $slider->descripcion_en=$descingles->texto;
       $slider->descripcion_pt=$descpt->texto;
        return $slider;
    }
    public function ActualizarSlider(Request $request,$id){
          $slider= Slider::find($id);
        //print_r($slider);exit;
        if($request->hasFile('editar-imagen')){
            Storage::delete($slider->imagen);
            $slider->imagen=$request->file('editar-imagen')->store('images/sliders');
        }
   		if($request->has('editar_imagen_slider_ingles')){
        	Storage::delete($slider->imagen_ingles);
            $slider->imagen_ingles=$request->file('editar_imagen_slider_ingles')->store('images/sliders');
        }
    	if($request->has('editar_imagen_slider_portugues')){
        	Storage::delete($slider->imagen_portugues);
            $slider->imagen_portugues=$request->file('editar_imagen_slider_portugues')->store('images/sliders');
        }
        if($request->edit_descripcion_en){
            $traduccion=$this->obtenerTraduccion($slider, 'en');
            $traduccion->texto=$request->edit_descripcion_en;
            $traduccion->update();
        }
        if($request->edit_descripcion_pt!=null || $request->edit_descripcion_pt!=''){
            $traduccion_pt=$this->obtenerTraduccion($slider, 'pt');
            $traduccion_pt->texto=$request->edit_descripcion_pt;
            $traduccion_pt->update();
        }
        if($request->edit_descripcion_es){
            $slider->texto = $request->edit_descripcion_es;
        }
        if($request->editar_orden){
            $slider->orden = $request->editar_orden;
        }
        if($request->pagina_editar){
            $slider->pagina = $request->pagina_editar;
        }

       $slider->update();

       return Redirect()->back()->with('success', 'El Slider se actualizó con éxito.');
   }
}
