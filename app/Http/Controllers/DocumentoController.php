<?php

namespace App\Http\Controllers;

use App\Models\CategoriaDocumento;
use App\Models\Documento;
use App\Models\Slider;
use App\Models\Translation;
use App\Models\Marcas;
use App\Models\Logos;
use App\Models\Script;
use App\Models\SubCategoriaDocumento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; 

class DocumentoController extends Controller
{
    public function obtenerObjetoTraduccion($columna,$fila,$locale){
        $traduccion=Translation::where('table','documentos')->where('column',$columna)->where('row_id',$fila)->where('locale',$locale)->first();
        return $traduccion;
    }
    public function obtenerTraduccion($columna,$fila,$locale){
        $traduccion=Translation::where('table','documentos')->where('column',$columna)->where('row_id',$fila)->where('locale',$locale)->first();
        return $traduccion->texto;
    }
    public function crearTraduccion($columna,$fila,$locale,$texto){
        Translation::create([
            'table'=>'documentos',
            'column'=>$columna,
            'row_id'=>$fila,
            'locale'=>$locale,
            'texto'=>$texto,
            ]);
    }
    public function index(){
        $sliders = Slider::where('pagina', 'documentos')
        ->orderby('orden',"ASC")
        ->get();
        $marcas = Marcas::orderby('id', "ASC")
        ->get();
        $categorias=CategoriaDocumento::orderby('orden',"ASC")->get();
        $logoIconoFutura = Logos::where('descripcion', 'logo nav bar')
        ->first();
        $scriptsHeader = Script::where('seccion', 'header')
        ->get();
        $scriptsBody = Script::where('seccion', 'body')
        ->get();
        return view('documentos', compact('sliders', 'marcas', 'categorias', 'logoIconoFutura', 'scriptsHeader', 'scriptsBody'));
    }
    public function vistaAdmin(){
        $subcategorias=SubCategoriaDocumento::orderby('orden',"ASC")->get();
        $categorias=CategoriaDocumento::orderby('orden',"ASC")->get();
        $documentos=Documento::orderby('orden',"ASC")->get();
        return view('admin.documentos.listaDocumentos',compact('subcategorias','categorias','documentos'));
    }
    public function agregarDocumento(Request $request){
        $descarga= new Documento($request->all());
        if($request->hasFile('archivo')){
            $descarga->archivo=$request->file('archivo')->storeAs('documentos',str_replace(' ','',trim($request->nombre)).".".$request->file('archivo')->getClientOriginalExtension());
        }
        if($descarga->save()){
            if($request->titulo_en){
                $this->crearTraduccion('nombre',$descarga->id,'en',$request->titulo_en);
            }
            if($request->titulo_pt){
                $this->crearTraduccion('nombre',$descarga->id,'pt',$request->titulo_pt);
            }
        }
    }
    public function editarDocumento($id){
        $descarga=Documento::find($id);
        $descarga->titulo_en=$this->obtenerTraduccion('nombre',$descarga->id,'en');
        $descarga->titulo_pt=$this->obtenerTraduccion('nombre',$descarga->id,'pt');
        return $descarga;
    }
    public function actualizarDocumento(Request $request,$id){
        $descarga=Documento::find($id);
        $titulo_en=$this->obtenerObjetoTraduccion('nombre',$descarga->id,'en');
        $titulo_pt=$this->obtenerObjetoTraduccion('nombre',$descarga->id,'pt');
        if($request->hasFile('archivo_edit')){
            $descarga->archivo=$request->file('archivo_edit')->storeAs('documentos',str_replace(' ','',trim($request->nombre)).".".$request->file('archivo_edit')->getClientOriginalExtension());
        }
        if($request->titulo_en){
            $titulo_en->texto=$request->titulo_en;
            $titulo_en->update();
        }
        if($request->titulo_pt){
            $titulo_pt->texto=$request->titulo_pt;
            $titulo_pt->update();
        }
        $descarga->update($request->all());
    }
    public function eliminarDocumento($id){
        $descarga=Documento::find($id);
        Storage::delete($descarga->archivo);
        $descarga->delete();
    }
}
