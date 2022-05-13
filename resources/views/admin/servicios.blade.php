@extends('admin.home')
@section('contenido')
<div class="container py-4 px-4">
    <div class="row">
        <div class="col-12 card">
            <table class="table">
                <thead class="card-head">
                    <tr>
                        <th> <h5>Editar Checks</h5> </th>
                    </tr>
                </thead>
                <tbody class="card-body">
                    @foreach($checks as $check)
                        <tr>
                            <td>
                                <form class="form-gorup" id="formularioCheck" name="formularioCheck" method="POST" action="" enctype="multipart/form-data">
                                    <div class="row">
                                        @csrf
                                        <div class="col-12">
                                            <label>Contenido</label>
                                            <input type="text" id="summernote_check" name="contenido" class="form-control" value="{!! $check->contenido !!}">
                                        </div>
                                        <div class="col-12">
                                            <label>Contenido ingles</label>
                                            <input type="text" id="summernote_check_en" name="contenido_en" class="form-control" value="{!! $check->contenido_en !!}">
                                        </div>
                                        <div class="col-12">
                                            <label>Contenido portugués</label>
                                            <input type="text" id="summernote_check_pt" name="contenido_pt" class="form-control" value="{!! $check->contenido_pt !!}">
                                        </div>
                                        <div class="col-12">
                                            <input type="hidden" class="form-control" id="id_editar" name="id_editar" value="{{$check->id}}">
                                        </div>    
                                        <div class="col-12">
                                            <input type="hidden" name="seccion" id="seccion" value="check" class="form-control">
                                        </div>                                        
                                        <div class="col-12 d-flex align-items-center justify-content-center pt-2">
                                            <button class="btn botonActualizar form-control" type="submmit">Actualizar</button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> 
    </div>
    <div class="row">
        <div class="col-12 card">
            <table class="table">
                <thead class="card-head">
                    <tr>
                        <th> <h5>Editar Antes y Después</h5> </th>
                    </tr>
                </thead>
                <tbody class="card-body">
                        <tr>
                            <td>
                                <form class="form-gorup" id="formularioAntesDespues" name="formularioAntesDespues" method="POST" action="" enctype="multipart/form-data">
                                    <div class="row">
                                        @csrf   
                                        <div class="col-12">
                                            <label>Imagen</label>
                                            @if(isset($antes_despues->imagen))
                                            <img id="preview-img" class="img-fluid" src="{{asset(Storage::url($antes_despues->imagen))}}"> 
                                            @endif
                                            <input type="file" id="imagen" name="imagen" class="form-control">
                                        </div>
                                        <div class="col-12">
                                            <input type="hidden" class="form-control" id="id_editar" name="id_editar" value="{{$antes_despues->id}}">
                                        </div>       
                                        <div class="col-12">
                                            <input type="hidden" name="seccion" id="seccion" value="antes_despues" class="form-control">
                                        </div>                                
                                        <div class="col-12 d-flex align-items-center justify-content-center pt-2">
                                            <button class="btn botonActualizar form-control" type="submmit">Actualizar</button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                </tbody>
            </table>
        </div> 
    </div>
    <div class="row">
        <div class="col-12 card">
            <table class="table">
                <thead class="card-head">
                    <tr>
                        <th> <h5>Editar Se incluye</h5> </th>
                    </tr>
                </thead>
                <tbody class="card-body">
                        <tr>
                            <td>
                                <form class="form-gorup" id="formularioSeIncluye" name="formularioSeIncluye" method="POST" action="" enctype="multipart/form-data">
                                    <div class="row">
                                        @csrf
                                        <div class="col-12">
                                            <label>Imagen</label>
                                            @if(isset($se_incluye->imagen))
                                            <img id="preview-img" class="img-fluid" src="{{asset(Storage::url($se_incluye->imagen))}}"> 
                                            @endif
                                            <input type="file" id="imagen" name="imagen" class="form-control">
                                        </div>
                                        <div class="col-12">
                                            <label>Titulo</label>
                                            <input type="text" class="form-control" name="titulo" id="titulo" value="{{$se_incluye->titulo}}">
                                        </div>´
                                        <div class="col-12">
                                            <label>Titulo ingles</label>
                                            <input type="text" class="form-control" name="titulo_en" id="titulo_en" value="{{$se_incluye->titulo_en}}">
                                        </div>
                                        <div class="col-12">
                                            <label>Titulo portugués</label>
                                            <input type="text" class="form-control" name="titulo_pt" id="titulo_pt" value="{{$se_incluye->titulo_pt}}">
                                        </div>
                                        <div class="col-12">
                                            <input type="hidden" class="form-control" id="id_editar" name="id_editar" value="{{$se_incluye->id}}">
                                        </div>       
                                        <div class="col-12">
                                            <input type="hidden" name="seccion" id="seccion" value="se_incluye" class="form-control">
                                        </div>                                
                                        <div class="col-12 d-flex align-items-center justify-content-center pt-2">
                                            <button class="btn botonActualizar form-control" type="submmit">Actualizar</button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                </tbody>
            </table>
        </div> 
    </div>
    <div class="row">
        <div class="col-12 card">
            <table class="table">
                <thead class="card-head">
                    <tr>
                        <th> <h5>Editar Mantenimientos</h5> </th>
                    </tr>
                </thead>
                <tbody class="card-body">
                    @foreach($mantenimientos as $mantenimiento)
                        <tr>
                            <td>
                                <form class="form-gorup" id="formularioMantenimientos" name="formularioMantenimientos" method="POST" action="" enctype="multipart/form-data">
                                    <div class="row">
                                        @csrf
                                        <div class="col-12">
                                            <label>Titulo</label>
                                            <input type="text" class="form-control" name="titulo" id="titulo" value="{{$mantenimiento->titulo}}">
                                        </div>´
                                        <div class="col-12">
                                            <label>Titulo ingles</label>
                                            <input type="text" class="form-control" name="titulo_en" id="titulo_en" value="{{$mantenimiento->titulo_en}}">
                                        </div>
                                        <div class="col-12">
                                            <label>Titulo portugués</label>
                                            <input type="text" class="form-control" name="titulo_pt" id="titulo_pt" value="{{$mantenimiento->titulo_pt}}">
                                        </div>
                                        <div class="col-12">
                                            <label>Contenido</label>
                                            <input type="text" id="summernote_check" name="contenido" class="form-control" value="{!! $mantenimiento->contenido !!}">
                                        </div>
                                        <div class="col-12">
                                            <label>Contenido ingles</label>
                                            <input type="text" id="summernote_check_en" name="contenido_en" class="form-control" value="{!! $mantenimiento->contenido_en !!}">
                                        </div>
                                        <div class="col-12">
                                            <label>Contenido portugués</label>
                                            <input type="text" id="summernote_check_pt" name="contenido_pt" class="form-control" value="{!! $mantenimiento->contenido_pt !!}">
                                        </div>
                                        <div class="col-12">
                                            <input type="hidden" class="form-control" id="id_editar" name="id_editar" value="{{$mantenimiento->id}}">
                                        </div>       
                                        <div class="col-12">
                                            <input type="hidden" name="seccion" id="seccion" value="mantenimiento" class="form-control">
                                        </div>                                
                                        <div class="col-12 d-flex align-items-center justify-content-center pt-2">
                                            <button class="btn botonActualizar form-control" type="submmit">Actualizar</button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> 
    </div>
    <div class="row">
        <div class="col-12 card">
            <table class="table">
                <thead class="card-head">
                    <tr>
                        <th> <h5>Editar Cards</h5> </th>
                    </tr>
                </thead>
                <tbody class="card-body">
                    @foreach($cards as $card)
                        <tr>
                            <td>
                                <form class="form-gorup" id="formularioCards" name="formularioCards" method="POST" action="" enctype="multipart/form-data">
                                    <div class="row">
                                        @csrf
                                        <div class="col-12">
                                            <label>Imagen</label>
                                            @if(isset($card->imagen))
                                            <img id="preview-img" class="img-fluid" src="{{asset(Storage::url($card->imagen))}}">
                                            @endif
                                            <input type="file" id="imagen" name="imagen" class="form-control">
                                        </div>
                                        <div class="col-12">
                                            <label>Titulo</label>
                                            <input type="text" class="form-control" name="titulo" id="titulo" value="{{$card->titulo}}">
                                        </div>´
                                        <div class="col-12">
                                            <label>Titulo ingles</label>
                                            <input type="text" class="form-control" name="titulo_en" id="titulo_en" value="{{$card->titulo_en}}">
                                        </div>
                                        <div class="col-12">
                                            <label>Titulo portugués</label>
                                            <input type="text" class="form-control" name="titulo_pt" id="titulo_pt" value="{{$card->titulo_pt}}">
                                        </div>
                                        <div class="col-12">
                                            <label>Contenido</label>
                                            <input type="text" id="summernote_check" name="contenido" class="form-control" value="{!! $card->contenido !!}">
                                        </div>
                                        <div class="col-12">
                                            <label>Contenido ingles</label>
                                            <input type="text" id="summernote_check_en" name="contenido_en" class="form-control" value="{!! $card->contenido_en !!}">
                                        </div>
                                        <div class="col-12">
                                            <label>Contenido portugués</label>
                                            <input type="text" id="summernote_check_pt" name="contenido_pt" class="form-control" value="{!! $card->contenido_pt !!}">
                                        </div>
                                        <div class="col-12">
                                            <input type="hidden" class="form-control" id="id_editar" name="id_editar" value="{{$card->id}}">
                                        </div>       
                                        <div class="col-12">
                                            <input type="hidden" name="seccion" id="seccion" value="card" class="form-control">
                                        </div>                                
                                        <div class="col-12 d-flex align-items-center justify-content-center pt-2">
                                            <button class="btn botonActualizar form-control" type="submmit">Actualizar</button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> 
    </div>
</div>
@endsection