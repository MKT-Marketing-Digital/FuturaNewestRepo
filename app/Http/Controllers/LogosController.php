<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Logos;
use Storage;

class LogosController extends Controller
{
    public function index(){
        $logos = Logos::orderby('id', "ASC")
        ->get();
        return view('admin.logos', compact('logos'));
    }
    public function agregarLogo(Request $request){
        $logo= new Logos();
        $logo->descripcion=$request->descripcion;
        if($request->has('imagen')){
            $logo->icono=$request->file('imagen')->store('images/logos');
        }
    	if($request->has('imagen_ingles')){
            $logo->icono_ingles=$request->file('imagen_ingles')->store('images/logos');
        }
    	if($request->has('imagen_portugues')){
            $logo->icono_portugues=$request->file('imagen_portugues')->store('images/logos');
        }
        $logo->save();
        return Redirect()->back()->with('success', 'El Logo se cargo con éxito.');
    }
    public function eliminarLogo($id){
        $logo= Logos::find($id);
        Storage::delete($logo->icono);
        $logo->delete();
    }
            
    public function editarLogo($id){
        $logo = Logos::findorFail($id);
        return $logo;
    }
    public function actualizarLogo(Request $request){
        $logo= Logos::findorFail($request->id_editar);
        //print_r($slider);exit;
        if($request->hasFile('editar_imagen')){
            Storage::delete($logo->icono);
            $logo->icono=$request->file('editar_imagen')->store('images/logos');
        }
    	if($request->has('editar_imagen_ingles')){
        	Storage::delete($logo->icono_ingles);
            $logo->icono_ingles=$request->file('editar_imagen_ingles')->store('images/logos');
        }
    	if($request->has('editar_imagen_portugues')){
        	Storage::delete($logo->icono_portugues);
            $logo->icono_portugues=$request->file('editar_imagen_portugues')->store('images/logos');
        }
        if($request->descripcion_editar){
            $logo->descripcion = $request->descripcion_editar;
        }

       $logo->update();

       return Redirect()->back()->with('success', 'El Logo se actualizó con éxito.');
   }
    
}
