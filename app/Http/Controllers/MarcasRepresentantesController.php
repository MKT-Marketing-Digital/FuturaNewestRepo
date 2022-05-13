<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; 
use App\Models\Marcas;

class MarcasRepresentantesController extends Controller
{
    public function index(){
        $marcas = Marcas::orderby('id',"ASC")
        ->get();

        return view('admin.marcas', compact('marcas'));
    }
    public function AgregarMarca(Request $request){
        $marca= new Marcas();
        $marca->nombre=$request->descripcion_marca;
        if($request->has('imagen_marca')){
            $marca->imagen=$request->file('imagen_marca')->store('images/marcas');
        }
        $marca->save();
        
        return Redirect()->back()->with('success', 'La Marca se cargo con éxito.');
    }
    public function EliminarMarca($id){
        $marca= Marcas::find($id);
        Storage::delete($marca->imagen);
        $marca->delete();
    }
            
    public function EditarMarca($id){
        $marca= Marcas::findorFail($id);
        return $marca;
    }

    public function ActualizarMarca(Request $request){
        $marca= Marcas::findorFail($request->id_editar_marca);
        if($request->hasFile('editar_imagen')){
            Storage::delete($marca->imagen);
            $marca->imagen=$request->file('editar_imagen')->store('images/marcas');
        }
        if($request->edit_summernote_marca){
            $marca->nombre = $request->edit_summernote_marca;
        }
       $marca->update();

       return Redirect()->back()->with('success', 'La Marca se actualizó con éxito.');
   }
}
