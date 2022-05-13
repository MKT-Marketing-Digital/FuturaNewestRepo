<?php

namespace App\Http\Controllers;

use App\Models\CategoriaDocumento;
use App\Models\SubCategoriaDocumento;
use App\Models\Translation;
use Illuminate\Http\Request;

class CategoriasDocumentosController extends Controller
{
    public function obtenerObjetoTraduccion($columna,$fila,$locale){
        $traduccion=Translation::where('table','categoria_documentos')->where('column',$columna)->where('row_id',$fila)->where('locale',$locale)->first();
        return $traduccion;
    }
    public function obtenerTraduccion($columna,$fila,$locale){
        $traduccion=Translation::where('table','categoria_documentos')->where('column',$columna)->where('row_id',$fila)->where('locale',$locale)->first();
        return $traduccion->texto;
    }
    public function crearTraduccion($columna,$fila,$locale,$texto){
        Translation::create([
            'table'=>'categoria_documentos',
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
        $categorias=CategoriaDocumento::orderby('orden',"ASC")->get();
        $subcategorias=SubCategoriaDocumento::orderby('orden',"ASC")->get();
        return view('admin.documentos.categorias.listadoCategorias',compact('categorias','subcategorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.documentos.categorias.agregarCategoria');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria= new CategoriaDocumento($request->all());
        if($categoria->save()){
            if($request->titulo_en){
                $this->crearTraduccion('titulo',$categoria->id,'en',$request->titulo_en);
            }
            if($request->titulo_pt){
                $this->crearTraduccion('titulo',$categoria->id,'pt',$request->titulo_pt);
            }
            return back()->with('success',"Categoria Agregada");
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
        $categoria=CategoriaDocumento::find($id);
        $categoria->titulo_en=$this->obtenerTraduccion('titulo',$categoria->id,'en');
        $categoria->titulo_pt=$this->obtenerTraduccion('titulo',$categoria->id,'pt');
        return view('admin.documentos.categorias.editarCategoria',compact('categoria'));

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
        $categoria=CategoriaDocumento::find($id);
        if($categoria->update($request->all())){
            if($request->titulo_en){
              $titulo_en=$this->obtenerObjetoTraduccion('titulo',$categoria->id,'en');
              $titulo_en->texto=$request->titulo_en;
              $titulo_en->update();
            }
            if($request->titulo_pt){
                $titulo_pt=$this->obtenerObjetoTraduccion('titulo',$categoria->id,'pt');
                $titulo_pt->texto=$request->titulo_pt;
                $titulo_pt->update();
            }
            return back()->with('success',"Categoria Actualizada");
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
        $categoria=CategoriaDocumento::find($id);
        if($categoria->subcategorias()->get()->isEmpty() && $categoria->documentos()->get()->isEmpty()){
            $categoria->delete();
            $traduccion_en=$this->obtenerObjetoTraduccion('titulo',$categoria->id,'en');
            $traduccion_en->delete();
            $titulo_pt=$this->obtenerObjetoTraduccion('titulo',$categoria->id,'pt');
            $titulo_pt->delete();
            return true;
        }else{
            return false;
        }
    }
}
