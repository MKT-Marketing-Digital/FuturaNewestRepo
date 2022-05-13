<?php

namespace App\Http\Controllers;

use App\Models\CategoriaDocumento;
use App\Models\SubCategoriaDocumento;
use App\Models\Translation;
use Illuminate\Http\Request;

class SubCategoriasDocumentosController extends Controller
{
    public function obtenerObjetoTraduccion($columna,$fila,$locale){
        $traduccion=Translation::where('table','sub_categoria_documentos')->where('column',$columna)->where('row_id',$fila)->where('locale',$locale)->first();
        return $traduccion;
    }
    public function obtenerTraduccion($columna,$fila,$locale){
        $traduccion=Translation::where('table','sub_categoria_documentos')->where('column',$columna)->where('row_id',$fila)->where('locale',$locale)->first();
        return $traduccion->texto;
    }
    public function crearTraduccion($columna,$fila,$locale,$texto){
        Translation::create([
            'table'=>'sub_categoria_documentos',
            'column'=>$columna,
            'row_id'=>$fila,
            'locale'=>$locale,
            'texto'=>$texto,
            ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $subcategorias=SubCategoriaDocumento::orderby('orden',"ASC")->get();
        return view('admin.documentos.subcategorias.listadoSubCategorias',compact('subcategorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=CategoriaDocumento::orderby('orden',"ASC")->get();
       return view('admin.documentos.subcategorias.agregarSubCategoria',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subcategoria= new SubCategoriaDocumento($request->all());
        if($subcategoria->save()){
            if($request->titulo_en){
                $this->crearTraduccion('titulo',$subcategoria->id,'en',$request->titulo_en);
            }
            if($request->titulo_pt){
                $this->crearTraduccion('titulo',$subcategoria->id,'pt',$request->titulo_pt);
            }
            return back()->with('success',"SubCategoria Agregada");
        }else{
            return back()->with('error',"Algo salió mal");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategoria=SubCategoriaDocumento::find($id);
        $categorias=CategoriaDocumento::orderby('orden',"ASC")->get();
        $subcategoria->titulo_en=$this->obtenerTraduccion('titulo',$subcategoria->id,'en');
        $subcategoria->titulo_pt=$this->obtenerTraduccion('titulo',$subcategoria->id,'pt');
        return view('admin.documentos.subcategorias.editarSubCategoria',compact('subcategoria','categorias'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subcategoria=SubCategoriaDocumento::find($id);
        if($subcategoria->update($request->all())){
            if($request->titulo_en){
              $titulo_en=$this->obtenerObjetoTraduccion('titulo',$subcategoria->id,'en');
              $titulo_en->texto=$request->titulo_en;
              $titulo_en->update();
            }
            if($request->titulo_pt){
                $titulo_pt=$this->obtenerObjetoTraduccion('titulo',$subcategoria->id,'pt');
                $titulo_pt->texto=$request->titulo_pt;
                $titulo_pt->update();
            }
            return back()->with('success',"SubCategoria Actualizada");
        }else{
            return back()->with('error',"Algo salió mal");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategoria=SubCategoriaDocumento::find($id);
        if($subcategoria->documentos()->get()->isEmpty()){
            $subcategoria->delete();
            $traduccion_en=$this->obtenerObjetoTraduccion('titulo',$subcategoria->id,'en');
            $traduccion_en->delete();
            $titulo_pt=$this->obtenerObjetoTraduccion('titulo',$subcategoria->id,'pt');
            $titulo_pt->delete();
            return true;
        }else{
            return false;
        }
    }
}
