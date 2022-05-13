<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\productoCategorias;
use App\Models\ProductoDescarga;
use App\Models\Translation;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function obtenerObjetoTraduccion($columna,$fila,$locale){
        $traduccion=Translation::where('table','productos')->where('column',$columna)->where('row_id',$fila)->where('locale',$locale)->first();
        return $traduccion;
    }
    public function obtenerTraduccion($columna,$fila,$locale){
        $traduccion=Translation::where('table','productos')->where('column',$columna)->where('row_id',$fila)->where('locale',$locale)->first();
        return $traduccion->texto;
    }
    public function crearTraduccion($columna,$fila,$locale,$traduccion){
        Translation::create([
            'table'=>'productos',
            'column'=>$columna,
            'row_id'=>$fila,
            'texto'=>$traduccion,
            'locale'=>$locale,
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos=Producto::all();
        $descargas=ProductoDescarga::orderby('orden',"ASC")->get();
        return view('admin.productos.productos.listado',compact('productos','descargas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=productoCategorias::orderby('orden',"ASC")->get();
        return view('admin.productos.productos.agregarProducto',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto=new Producto($request->all());
        if($producto->save()){
            $this->crearTraduccion('texto',$producto->id,'en',$request->texto_en);
            $this->crearTraduccion('texto',$producto->id,'pt',$request->texto_pt);
            return back()->with('success',"Producto Agregado");
        }else{
            return back()->with('error',"Algo Salió Mal");
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
        $categorias=productoCategorias::orderby('orden',"ASC")->get();
        $producto=Producto::find($id);
        $producto->texto_en=$this->obtenerTraduccion('texto',$producto->id,'en');
        $producto->texto_pt=$this->obtenerTraduccion('texto',$producto->id,'pt');
    	$producto->texto = $producto->texto;
        return view('admin.productos.productos.editarProducto',compact('categorias','producto'));
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
        $producto=Producto::find($id);
        $texto_en=$this->obtenerObjetoTraduccion('texto',$producto->id,'en');
        $texto_pt=$this->obtenerObjetoTraduccion('texto',$producto->id,'pt');
        if($request->texto_en){
            $texto_en->texto=$request->texto_en;
            $texto_en->update();
        }
        if($request->texto_pt){
            $texto_pt->texto=$request->texto_pt;
            $texto_pt->update();
        }
        if($producto->update($request->all())){
            return back()->with('success',"Producto Actualizado");
        }else{
            return back()->with('error',"Algo Salió Mal");
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
        $producto=Producto::find($id);
        $producto->delete();
    }

    
}
