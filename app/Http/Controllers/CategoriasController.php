<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Translation;
use App\Models\Logos;
use App\Models\Script;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\productoCategorias;
use App\Models\Slider;
use App\Models\Marcas;

class CategoriasController extends Controller
{
    public function index(){
        $categorias = productoCategorias::orderby('orden', "ASC")
        ->get();
        
        return view('admin.productos.categorias.Categorias', compact('categorias'));
    }

    public function obtenerTraduccion($categoria, $locale){
        $traduccion=Translation::where('table','producto_categorias')
        ->where('column','titulo')
        ->where('row_id',$categoria->id)
        ->where('locale', $locale)
        ->first();       
        return $traduccion;
    }

    public function agregarCategoria(Request $request){
        $categoria = new productoCategorias();
        $categoria->orden = $request->orden;
        $categoria->titulo = $request->titulo;
        if($request->has('imagen')){
            $categoria->imagen = $request->file('imagen')->store('images/categorias');
        }
        $categoria->save();
        $tiutloIngles= $request->titulo_en;
        if($tiutloIngles){
            Translation::create([
                'table'=>'producto_categorias',
                'column'=>'titulo',
                'row_id'=>$categoria->id,
                'locale'=>'en',
                'texto'=>$tiutloIngles,
                ]);
        }
        if($request->titulo_pt){
            Translation::create([
                'table'=>'producto_categorias',
                'column'=>'titulo',
                'row_id'=>$categoria->id,
                'locale'=>'pt',
                'texto'=>$request->titulo_pt,
                ]);
        }
        return Redirect()->back()->with('success', 'La categoria se cargo con éxito.');
    }

    public function editarCategoria($id){
        $categoria= productoCategorias::findorFail($id);
        $titulo_en=$this->obtenerTraduccion($categoria, 'en');
        if($titulo_en->texto){
            $categoria->titulo_en=$titulo_en->texto;
        }
        $titulo_pt=$this->obtenerTraduccion($categoria, 'pt');
        if($titulo_pt->texto){
            $categoria->titulo_pt=$titulo_pt->texto;
        }
        $categoria->titulo = $categoria->titulo;

        return $categoria; 
    }

    public function actualizarCategoria(Request $request){
        $categoria= productoCategorias::findorFail($request->id_editar);
        //print_r($slider);exit;
        if($request->hasFile('editar_imagen')){
            Storage::delete($categoria->imagen);
            $categoria->imagen=$request->file('editar_imagen')->store('images/categorias');
        }
        if($request->edit_titulo_en){
            $traduccion=$this->obtenerTraduccion($categoria, 'en');
            $traduccion->texto=$request->edit_titulo_en;
            $traduccion->update();
        }
        if($request->edit_titulo_pt!=null || $request->edit_titulo_pt!=''){
            $traduccion_pt=$this->obtenerTraduccion($categoria, 'pt');
            $traduccion_pt->texto=$request->edit_titulo_pt;
            $traduccion_pt->update();
        }
        if($request->edit_titulo){
            $categoria->titulo = $request->edit_titulo;
        }
        if($request->editar_orden){
            $categoria->orden = $request->editar_orden;
        }

       $categoria->update();

       return Redirect()->back()->with('success', 'El Slider se actualizó con éxito.');
    }

    public function elimiarCategoria($id){
        $categoria= productoCategorias::find($id);
        Storage::delete($categoria->imagen);
        $traduccion_en=$this->obtenerTraduccion($categoria, 'en');
        $traduccion_pt=$this->obtenerTraduccion($categoria, 'pt');
        if($traduccion_en){
            $traduccion_en->delete();
        }
        if($traduccion_pt){
            $traduccion_pt->delete();
        }
        $categoria->delete();
    }

    public function vista(){
        $sliders = Slider::where('pagina', 'productos')
        ->orderby('orden',"ASC")
        ->get();
        $marcas = Marcas::orderby('id', "ASC")
        ->get();
        $categorias = productoCategorias::orderby('orden', "ASC")
        ->get();
        $logoIconoFutura = Logos::where('descripcion', 'logo nav bar')
        ->first();
        $scriptsHeader = Script::where('seccion', 'header')
        ->get();
        $scriptsBody = Script::where('seccion', 'body')
        ->get();
        return view('productos', compact('sliders', 'marcas', 'categorias', 'logoIconoFutura', 'scriptsHeader', 'scriptsBody'));
    }

    public function vistaRinglock(){
        $logoIconoFutura = Logos::where('descripcion', 'logo nav bar')
        ->first();
        $scriptsHeader = Script::where('seccion', 'header')
        ->get();
        $scriptsBody = Script::where('seccion', 'body')
        ->get();
        return view('ringlock', compact('logoIconoFutura', 'scriptsHeader', 'scriptsBody'));
    }
}
