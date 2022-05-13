<?php

namespace App\Http\Controllers;

use App\Models\Translation;
use App\Models\QuienesSomosArchivos;
use App\Models\QuienesSomos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; 

class QuienesSomosAdminController extends Controller
{
    public function index(){
        //mision
        $formularioMision = QuienesSomos::where('tipo', 'mision')
        ->first();
        $misionTituloInlges =  Translation::where('table', 'quienes_somos')
        ->where('column', 'titulo')
        ->where('locale', 'en')
        ->where('row_id', '1')
        ->first();
        $formularioMision->titulo_ingles = $misionTituloInlges->texto;
        $misionTituloPortugues =  Translation::where('table', 'quienes_somos')
        ->where('column', 'titulo')
        ->where('locale', 'pt')
        ->where('row_id', '1')
        ->first();
        $formularioMision->titulo_portugues = $misionTituloPortugues->texto;
        $misionContenidoIngles =  Translation::where('table', 'quienes_somos')
        ->where('column', 'contenido')
        ->where('locale', 'en')
        ->where('row_id', '1')
        ->first();
        $formularioMision->contenido_ingles = $misionContenidoIngles->texto;
        $misionContenidoPortugues =  Translation::where('table', 'quienes_somos')
        ->where('column', 'contenido')
        ->where('locale', 'pt')
        ->where('row_id', '1')
        ->first();
        $formularioMision->contenido_portugues = $misionContenidoPortugues->texto;

        //vision
        $formularioVision = QuienesSomos::where('tipo', 'vision')
        ->first();
        $visionTituloInlges =  Translation::where('table', 'quienes_somos')
        ->where('column', 'titulo')
        ->where('locale', 'en')
        ->where('row_id', '2')
        ->first();
        $formularioVision->titulo_ingles = $visionTituloInlges->texto;
        $visionTituloPortugues =  Translation::where('table', 'quienes_somos')
        ->where('column', 'titulo')
        ->where('locale', 'pt')
        ->where('row_id', '2')
        ->first();
        $formularioVision->titulo_portugues = $visionTituloPortugues->texto;
        $visionContenidoIngles =  Translation::where('table', 'quienes_somos')
        ->where('column', 'contenido')
        ->where('locale', 'en')
        ->where('row_id', '2')
        ->first();
        $formularioVision->contenido_ingles = $visionContenidoIngles->texto;
        $visionContenidoPortugues =  Translation::where('table', 'quienes_somos')
        ->where('column', 'contenido')
        ->where('locale', 'pt')
        ->where('row_id', '2')
        ->first();
        $formularioVision->contenido_portugues = $visionContenidoPortugues->texto;

        //valores
        $formularioValores = QuienesSomos::where('tipo', 'valores')
        ->first();
        $valoresTituloInlges =  Translation::where('table', 'quienes_somos')
        ->where('column', 'titulo')
        ->where('locale', 'en')
        ->where('row_id', '3')
        ->first();
        $formularioValores->titulo_ingles = $valoresTituloInlges->texto;
        $valoresTituloPortugues =  Translation::where('table', 'quienes_somos')
        ->where('column', 'titulo')
        ->where('locale', 'pt')
        ->where('row_id', '3')
        ->first();
        $formularioValores->titulo_portugues = $valoresTituloPortugues->texto;
        $valoresContenidoIngles =  Translation::where('table', 'quienes_somos')
        ->where('column', 'contenido')
        ->where('locale', 'en')
        ->where('row_id', '3')
        ->first();
        $formularioValores->contenido_ingles = $valoresContenidoIngles->texto;
        $valoresContenidoPortugues =  Translation::where('table', 'quienes_somos')
        ->where('column', 'contenido')
        ->where('locale', 'pt')
        ->where('row_id', '3')
        ->first();
        $formularioValores->contenido_portugues = $valoresContenidoPortugues->texto;

        //calidad
        $formularioCalidad = QuienesSomos::where('tipo', 'calidad')
        ->first();
        $calidadTituloInlges =  Translation::where('table', 'quienes_somos')
        ->where('column', 'titulo')
        ->where('locale', 'en')
        ->where('row_id', '4')
        ->first();
        $formularioCalidad->titulo_ingles = $calidadTituloInlges->texto;
        $calidadTituloPortugues =  Translation::where('table', 'quienes_somos')
        ->where('column', 'titulo')
        ->where('locale', 'pt')
        ->where('row_id', '4')
        ->first();
        $formularioCalidad->titulo_portugues = $calidadTituloPortugues->texto;
        $calidadContenidoIngles =  Translation::where('table', 'quienes_somos')
        ->where('column', 'contenido')
        ->where('locale', 'en')
        ->where('row_id', '4')
        ->first();
        $formularioCalidad->contenido_ingles = $calidadContenidoIngles->texto;
        $calidadContenidoPortugues =  Translation::where('table', 'quienes_somos')
        ->where('column', 'contenido')
        ->where('locale', 'pt')
        ->where('row_id', '4')
        ->first();
        $formularioCalidad->contenido_portugues = $calidadContenidoPortugues->texto;

        //politicas
        $formularioPoliticas = QuienesSomos::where('tipo', 'politicas')
        ->first();
        $politicasTituloInlges =  Translation::where('table', 'quienes_somos')
        ->where('column', 'titulo')
        ->where('locale', 'en')
        ->where('row_id', '5')
        ->first();
        $formularioPoliticas->titulo_ingles = $politicasTituloInlges->texto;
        $politicasTituloPortugues =  Translation::where('table', 'quienes_somos')
        ->where('column', 'titulo')
        ->where('locale', 'pt')
        ->where('row_id', '5')
        ->first();
        $formularioPoliticas->titulo_portugues = $politicasTituloPortugues->texto;
        $politicasContenidoIngles =  Translation::where('table', 'quienes_somos')
        ->where('column', 'contenido')
        ->where('locale', 'en')
        ->where('row_id', '5')
        ->first();
        $formularioPoliticas->contenido_ingles = $politicasContenidoIngles->texto;
        $politicasContenidoPortugues =  Translation::where('table', 'quienes_somos')
        ->where('column', 'contenido')
        ->where('locale', 'pt')
        ->where('row_id', '5')
        ->first();
        $formularioPoliticas->contenido_portugues = $politicasContenidoPortugues->texto;

        $archivos = QuienesSomosArchivos::orderby('orden', "ASC")
        ->get();

        //historia
        $formularioHistoria = QuienesSomos::where('tipo', 'historia')
        ->first();
        $historiaTituloInlges =  Translation::where('table', 'quienes_somos')
        ->where('column', 'titulo')
        ->where('locale', 'en')
        ->where('row_id', '7')
        ->first();
        $formularioHistoria->titulo_ingles = $historiaTituloInlges->texto;
        $historiaTituloPortugues =  Translation::where('table', 'quienes_somos')
        ->where('column', 'titulo')
        ->where('locale', 'pt')
        ->where('row_id', '7')
        ->first();
        $formularioHistoria->titulo_portugues = $historiaTituloPortugues->texto;
        $historiaContenidoIngles =  Translation::where('table', 'quienes_somos')
        ->where('column', 'contenido')
        ->where('locale', 'en')
        ->where('row_id', '7')
        ->first();
        $formularioHistoria->contenido_ingles = $historiaContenidoIngles->texto;
        $historiaContenidoPortugues =  Translation::where('table', 'quienes_somos')
        ->where('column', 'contenido')
        ->where('locale', 'pt')
        ->where('row_id', '7')
        ->first();
        $formularioHistoria->contenido_portugues = $historiaContenidoPortugues->texto;

        //decada
        $formulariosDecadas = QuienesSomos::where('tipo', 'decada')
        ->orderby('id', "ASC")
        ->get();
        foreach($formulariosDecadas as $formularioDecada){
            $decadaTituloInlges =  Translation::where('table', 'quienes_somos')
            ->where('column', 'titulo')
            ->where('locale', 'en')
            ->where('row_id', $formularioDecada->id)
            ->first();
            $formularioDecada->titulo_ingles = $decadaTituloInlges->texto;
            $decadaTituloPortugues =  Translation::where('table', 'quienes_somos')
            ->where('column', 'titulo')
            ->where('locale', 'pt')
            ->where('row_id', $formularioDecada->id)
            ->first();
            $formularioDecada->titulo_portugues = $decadaTituloPortugues->texto;
            $decadaContenidoIngles =  Translation::where('table', 'quienes_somos')
            ->where('column', 'contenido')
            ->where('locale', 'en')
            ->where('row_id', $formularioDecada->id)
            ->first();
            $formularioDecada->contenido_ingles = $decadaContenidoIngles->texto;
            $decadaContenidoPortugues =  Translation::where('table', 'quienes_somos')
            ->where('column', 'contenido')
            ->where('locale', 'pt')
            ->where('row_id', $formularioDecada->id)
            ->first();
            $formularioDecada->contenido_portugues = $decadaContenidoPortugues->texto;
        }

        return view('admin.quienesSomos.quienesSomos', compact('formularioMision', 'formularioVision', 'formularioValores', 'formularioCalidad', 'formularioPoliticas', 'archivos', 'formularioHistoria', 'formulariosDecadas'));
    }
    
    public function actualizarFormulario(Request $request){
        $formulario = QuienesSomos ::findorFail($request->id);
        if($request->hasFile('logo')){
            Storage::delete($formulario->logo);
            $formulario->logo=$request->file('logo')->store('images/quienesSomos');
        }
        $formulario->titulo = $request->titulo;
        $formulario->contenido = $request->contenido;

        $tituloInlges =  Translation::where('table', 'quienes_somos')
        ->where('column', 'titulo')
        ->where('locale', 'en')
        ->where('row_id', $request->id)
        ->first();
        $tituloInlges->texto = $request->titulo_ingles;
        $tituloInlges->update();

        $tituloPortugues =  Translation::where('table', 'quienes_somos')
        ->where('column', 'titulo')
        ->where('locale', 'pt')
        ->where('row_id', $request->id)
        ->first();
        $tituloPortugues->texto = $request->titulo_portugues;
        $tituloPortugues->update();

        $contenidoIngles =  Translation::where('table', 'quienes_somos')
        ->where('column', 'contenido')
        ->where('locale', 'en')
        ->where('row_id', $request->id)
        ->first();
        $contenidoIngles->texto = $request->contenido_ingles;
        $contenidoIngles->update();

        $contenidoPortugues =  Translation::where('table', 'quienes_somos')
        ->where('column', 'contenido')
        ->where('locale', 'pt')
        ->where('row_id', $request->id)
        ->first();
        $contenidoPortugues->texto = $request->contenido_portugues;
        $contenidoPortugues->update();

        $formulario->update();

        return Redirect()->back()->with('success', 'Se actualizó con éxito.');
    }

    public function AgregarArchivo(Request $request){
        $archivo= new QuienesSomosArchivos();
        $archivo->orden=$request->archivo_orden;
        $archivo->nombre=$request->nombre_archivo;
        $nombre_url = str_replace(' ', '', $request->nombre_archivo).'.pdf';
        $archivo->archivo = $_FILES['archivo']['name'];
        if($request->has('archivo')){
            $request->file('archivo')->storeAs('archivos/quienesSomos', $nombre_url);
        }
        $archivo->save();

        return Redirect()->back()->with('success', 'El Archivo se cargo con éxito.');
    }
    public function EliminarArchivo($id){
        $archivo= QuienesSomosArchivos::find($id);
        Storage::delete($archivo->archivo);

        $archivo->delete();
    }
            
    public function EditarArchivo($id){
        $archivo= QuienesSomosArchivos::findorFail($id);
        return $archivo;
    }
    public function ActualizarArchivo(Request $request){
        $archivo= QuienesSomosArchivos::findorFail($request->idArchivo);
        $nombre_url = str_replace(' ', '', $request->editar_archivo).'.pdf';
        if($request->hasFile('editar_archivo')){
            Storage::delete($archivo->archivo);
            $archivo->archivo = $request->file('editar_archivo')->storeAs('archivos/quienesSomos', $nombre_url);
        }
        if($request->edit_nombre_archivo){
            $archivo->nombre = $request->edit_nombre_archivo;
        }
        if($request->editar_orden){
            $archivo->orden = $request->editar_orden;
        }

       $archivo->update();

       return Redirect()->back()->with('success', 'El Archivo se actualizó con éxito.');
   }
}
