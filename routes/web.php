<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('link',function(){
	//$targetFolder = '../storage/app/public';


	//$linkFolder = '/public_html/storage';

	//symlink($targetFolder,$linkFolder);
	
	//echo 'Symlink process successfully completed from <strong>'.$targetFolder.' </strong> to <strong>'.$linkFolder.'</strong>';
Artisan::call('route:clear');
return "CACHE";
});
Route::get('cache',function(){
	Artisan::call('route:clear');
});
Route::get('/', 'InicioController@index')->name('InicioFront');
Route::post('/', 'InicioController@enviarConsulta');
//
Route::get('/productos', 'CategoriasController@vista')->name('ProductosFront'); 
Route::get('/ringlock', 'CategoriasController@vistaRinglock')->name('RinglockFront');
Route::get('/quienes-somos', 'QuienesSomosController@index')->name('QuienesSomosFront');
Route::get('/servicios', 'ServiciosController@vista')->name('ServiciosFront');
Route::get('/documentos', 'DocumentoController@index')->name('DocumentosFront');
Route::get('/distribuidores', 'DistribuidoresController@index')->name('DistribuidoresFront');
//
Route::get('/contacto', 'ContactoController@index')->name('ContactoFront');
Route::post('/contacto', 'ContactoController@enviarConsulta')->name('EnviarConsulta');

Route::get('/gracias', 'GraciasController@index')->name('gracias.index');

Route::get('lang/{locale}', 'LocalizationController@lang');

Auth::routes();

//admin

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){

//sliders
Route::get('/home/adm/sliders/{pagina}', 'SliderController@index')->name('Slider.indexVariable');
Route::get('/home/adm/sliders/{pagina}/editar/{id}', 'SliderController@EditarSlider')->name('Slider.editarSlider');
Route::post('/home/adm/sliders/{pagina}', 'SliderController@AgregarSlider');
Route::put('home/adm/sliders/{id}', 'SliderController@ActualizarSlider')->name('slider.actualizar');
Route::delete('/home/adm/sliders/{pagina}/{id}', 'SliderController@EliminarSlider');
//Logos
Route::get('/home/adm/logos', 'LogosController@index')->name('Logos.index');
Route::get('/home/adm/logos/editar/{id}', 'LogosController@editarLogo')->name('Logos.editarLogo');
Route::post('/home/adm/logos', 'LogosController@agregarLogo')->name('Logos.agregarLogo');
Route::patch('/home/adm/logos/{id}', 'LogosController@actualizarLogo')->name('Logos.actualizarLogo');
Route::delete('/home/adm/logos/{id}', 'LogosController@eliminarLogo')->name('Logos.eliminarLogo');
//
Route::get('/home/adm/marcas', 'MarcasRepresentantesController@index')->name('Marcas.index');
Route::post('/home/adm/marcas', 'MarcasRepresentantesController@AgregarMarca');
Route::post('/home/adm/marcas/{id}', 'MarcasRepresentantesController@ActualizarMarca')->name('Marcas.actualizar');
Route::get('/home/adm/marcas/editar/{id}', 'MarcasRepresentantesController@EditarMarca')->name('Marcas.editarMarca');
Route::delete('/home/adm/marcas/eliminar/{id}', 'MarcasRepresentantesController@EliminarMarca')->name('Marcas.eliminarMarca');
//Categorias
Route::get('/home/adm/productos-admin/categorias', 'CategoriasController@index')->name('ProductosAdminCategorias.index');
Route::post('/home/adm/productos-admin/categorias', 'CategoriasController@agregarCategoria');
Route::get('/home/adm/productos-admin/categorias/editar/{id}', 'CategoriasController@editarCategoria')->name('ProductosAdminCategorias.editarSlider');
Route::patch('/home/adm/productos-admin/categorias/{id}', 'CategoriasController@actualizarCategoria')->name('ProductosAdminCategorias.actualizar');
Route::delete('/home/adm/productos-admin/categorias/{id}', 'CategoriasController@elimiarCategoria');

//Productos
Route::resource('/home/adm/productos', 'ProductosController');
Route::prefix('home/adm/productos')->group(function () {
    Route::post('agregarDescarga','DescargasController@agregarDescarga');
    Route::get('editarDescarga/{id}','DescargasController@editarDescarga');
    Route::put('actualizarDescarga/{id}','DescargasController@actualizarDescarga');
    Route::delete('eliminarDescarga/{id}','DescargasController@eliminarDescarga');
});
    //Documentos
        //Categorias
        Route::resource('home/adm/documentos-categorias','CategoriasDocumentosController');
        Route::resource('home/adm/documentos-subcategorias','SubCategoriasDocumentosController');
    Route::get('home/adm/documentos','DocumentoController@vistaAdmin')->name('documentos.index');
    Route::post('home/adm/documentos/agregarDocumento','DocumentoController@agregarDocumento');
    Route::get('home/adm/documentos/editarDocumento/{id}','DocumentoController@editarDocumento');
    Route::put('home/adm/documentos/actualizarDocumento/{id}','DocumentoController@actualizarDocumento');
    Route::delete('home/adm/documentos/eliminarDocumento/{id}','DocumentoController@eliminarDocumento');
    //Scripts
    Route::resource('home/adm/scripts', 'ScriptsController');
Route::get('/home/adm/quienes-somos-admin', 'QuienesSomosAdminController@index')->name('QuienesSomosAdmin.index');
Route::put('/home/adm/quienes-somos-admin', 'QuienesSomosAdminController@actualizarFormulario')->name('QuienesSomosAdmin.actualizar');
Route::post('/home/adm/quienes-somos-admin', 'QuienesSomosAdminController@AgregarArchivo');
Route::patch('/home/adm/quienes-somos-admin/{id}', 'QuienesSomosAdminController@ActualizarArchivo');
Route::delete('/home/adm/quienes-somos-admin/archivo/{id}', 'QuienesSomosAdminController@EliminarArchivo');
Route::get('/home/adm/quienes-somos-admin/archivo/editar/{id}', 'QuienesSomosAdminController@EditarArchivo');


//servicios
Route::get('/home/adm/servicios-admin', 'ServiciosController@index')->name('Servicios.index');
Route::post('/home/adm/servicios-admin', 'ServiciosController@actualizarServicio')->name('Servicios.actualizar');

});
//pagina


