<?php

namespace App\Http\Controllers;

use App\Models\ProductoDescarga;
use App\Models\Translation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DescargasController extends Controller
{
    public function obtenerObjetoTraduccion($columna,$fila,$locale){
        $traduccion=Translation::where('table','producto_descargas')->where('column',$columna)->where('row_id',$fila)->where('locale',$locale)->first();
        return $traduccion;
    }
    public function obtenerTraduccion($columna,$fila,$locale){
        $traduccion=Translation::where('table','producto_descargas')->where('column',$columna)->where('row_id',$fila)->where('locale',$locale)->first();
        return $traduccion->texto;
    }
    public function crearTraduccion($columna,$fila,$locale,$traduccion){
        Translation::create([
            'table'=>'producto_descargas',
            'column'=>$columna,
            'row_id'=>$fila,
            'texto'=>$traduccion,
            'locale'=>$locale,
        ]);
    }
    public function agregarDescarga(Request $request){
        $descarga= new ProductoDescarga($request->all());
        if($request->hasFile('archivo')){
            $descarga->archivo=$request->file('archivo')->storeAs('descargas',str_replace(' ','',trim($request->nombre)).".".$request->file('archivo')->getClientOriginalExtension());
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
    public function editarDescarga($id){
        $descarga=ProductoDescarga::find($id);
        $descarga->titulo_en=$this->obtenerTraduccion('nombre',$descarga->id,'en');
        $descarga->titulo_pt=$this->obtenerTraduccion('nombre',$descarga->id,'pt');
        return $descarga;
    }
    public function actualizarDescarga(Request $request,$id){
        $descarga=ProductoDescarga::find($id);
        $titulo_en=$this->obtenerObjetoTraduccion('nombre',$descarga->id,'en');
        $titulo_pt=$this->obtenerObjetoTraduccion('nombre',$descarga->id,'pt');
        if($request->hasFile('archivo_edit')){
            $descarga->archivo=$request->file('archivo_edit')->storeAs('descargas',str_replace(' ','',trim($request->nombre)).".".$request->file('archivo')->getClientOriginalExtension());
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
    public function eliminarDescarga($id){
        $descarga=ProductoDescarga::find($id);
        Storage::delete($descarga->archivo);
        $descarga->delete();
    }
}
