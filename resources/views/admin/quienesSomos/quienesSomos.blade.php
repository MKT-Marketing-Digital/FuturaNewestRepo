@extends('admin.home')
@section('contenido')
<div class="container px-2">
    <div class="row pt-4 mb-2 px-4">
        <div class="col-12 card">
            <table class="table">
                <thead class="card-head">
                    <th>
                        <h5>Editar Misi&oacute;n</h5>
                    </th>
                    <th>
                        <h5>Editar Visi&oacute;n</h5>
                    </th>
                    <th>
                        <h5>Editar Valores</h5>
                    </th>     
                </thead>
                <tr class="card-body">
                    <td>
                        <form class="form-group"  method="POST" enctype="multipart/form-data">
                        <div class="row">
                                @csrf @method('PUT')
                                <div class="col-12 pb-2">
                                    <label><h5>Logo</h5></label><br>
                                    <img id="preview-img" class="img-fluid" src="{{asset(Storage::url($formularioMision->logo))}}">
                                    <input type="file" class="form-control" value="{{$formularioMision->logo}}" name="logo" id="logo_mision">
                                </div>
                                <div class="col-12 pb-2">
                                    <label><h5>Titulo</h5></label>
                                    <input type="text" class="form-control" value="{{$formularioMision->titulo}}" name="titulo" id="titulo_mision">
                                </div>
                                <div class="col-12 pb-2">
                                    <label><h5>Titulo ingles</h5></label>
                                    <input type="text" class="form-control" value="{{$formularioMision->titulo_ingles}}" name="titulo_ingles" id="titulo_mision_ingles">
                                </div>
                                <div class="col-12 pb-2">
                                    <label><h5>Titulo portugués</h5></label>
                                    <input type="text" class="form-control" value="{{$formularioMision->titulo_portugues}}" name="titulo_portugues" id="titulo_mision_portugues">
                                </div>
                                <div class="col-12 pb-2">
                                    <label><h5>Contenido</h5></label>
                                    <textarea class="form-control" name="contenido" id="summernote_mision">{!! $formularioMision->contenido !!}</textarea>
                                </div>
                                <div class="col-12 pb-2">
                                    <label><h5>Contenido ingles</h5></label>
                                    <textarea class="form-control" name="contenido_ingles" id="summernote_mision_ingles">{!! $formularioMision->contenido_ingles !!}</textarea>
                                </div>
                                <div class="col-12 pb-2">
                                    <label><h5>Contenido portugués</h5></label>
                                    <textarea class="form-control" name="contenido_portugues" id="summernote_mision_portugues">{!! $formularioMision->contenido_portugues !!}</textarea>
                                </div>
                                <div class="col-12">
                                    <input type="hidden" class="form-control" value="mision" name="tipoformulario" id="tipoformulario">
                                </div>
                                <div class="col-12">
                                    <input type="hidden" class="form-control" value="{{$formularioMision->id}}" name="id" id="id">
                                </div>
                                <div class="col-12 pt-2 d-flex align-items-center justify-content-center">
                                    <button class="btn buttonFormularioQuienesSomos form-control" type="submmit">Actualizar</button>
                                </div>
                            </div>
                        </form>
                    </td>
                    <td>
                        <form class="form-group"  method="POST" enctype="multipart/form-data">
                        @csrf @method('PUT')
                            <div class="row">
                                <div class="col-12 pb-2">
                                    <label><h5>Logo</h5></label><br>
                                    <img id="preview-img" class="img-fluid" src="{{asset(Storage::url($formularioVision->logo))}}">
                                    <input type="file" class="form-control" value="{{$formularioVision->logo}}" name="logo" id="logo_vision">
                                </div>
                                <div class="col-12 pb-2">
                                    <label><h5>Titulo</h5></label>
                                    <input type="text" class="form-control" value="{{$formularioVision->titulo}}" name="titulo" id="titulo_vision">
                                </div>
                                <div class="col-12 pb-2">
                                    <label><h5>Titulo ingles</h5></label>
                                    <input type="text" class="form-control" value="{{$formularioVision->titulo_ingles}}" name="titulo_ingles" id="titulo_vision_ingles">
                                </div>
                                <div class="col-12 pb-2">
                                    <label><h5>Titulo portugués</h5></label>
                                    <input type="text" class="form-control" value="{{$formularioVision->titulo_portugues}}" name="titulo_portugues" id="titulo_vision_portugues">
                                </div>
                                <div class="col-12 pb-2">
                                    <label><h5>Contenido</h5></label>
                                    <textarea class="form-control" value="" name="contenido" id="summernote_vision">{!! $formularioVision->contenido !!}</textarea>
                                </div>
                                <div class="col-12 pb-2">
                                    <label><h5>Contenido ingles</h5></label>
                                    <textarea class="form-control" value="" name="contenido_ingles" id="summernote_vision_ingles">{!! $formularioVision->contenido_ingles !!}</textarea>
                                </div>
                                <div class="col-12 pb-2">
                                    <label><h5>Contenido portugues</h5></label>
                                    <textarea class="form-control" value="" name="contenido_portugues" id="summernote_vision_portugues">{!! $formularioVision->contenido_portugues !!}</textarea>
                                </div>
                                <div class="col-12">
                                    <input type="hidden" class="form-control" value="vision" name="tipoformulario" id="tipoformulario">
                                </div>
                                <div class="col-12">
                                    <input type="hidden" class="form-control" value="{{$formularioVision->id}}" name="id" id="id">
                                </div>
                                <div class="col-12 pt-2 d-flex align-items-center justify-content-center">
                                    <button class="btn buttonFormularioQuienesSomos form-control" type="submmit">Actualizar</button>
                                </div>
                            </div>
                        </form>
                    </td>
                    <td>
                        <form class="form-group"  method="POST" enctype="multipart/form-data">
                        @csrf @method('PUT')
                            <div class="row">
                                <div class="col-12 pb-2">
                                    <label><h5>Logo</h5></label><br>
                                    <img id="preview-img" class="img-fluid" src="{{asset(Storage::url($formularioValores->logo))}}">
                                    <input type="file" class="form-control" value="{{$formularioValores->logo}}" name="logo" id="logo_valores">
                                </div>
                                <div class="col-12 pb-2">
                                    <label><h5>Titulo</h5></label>
                                    <input type="text" class="form-control" value="{{$formularioValores->titulo}}" name="titulo" id="titulo_valores">
                                </div>
                                <div class="col-12 pb-2">
                                    <label><h5>Titulo ingles</h5></label>
                                    <input type="text" class="form-control" value="{{$formularioValores->titulo_ingles}}" name="titulo_ingles" id="titulo_valores_ingles">
                                </div>
                                <div class="col-12 pb-2">
                                    <label><h5>Titulo portugués</h5></label>
                                    <input type="text" class="form-control" value="{{$formularioValores->titulo_portugues}}" name="titulo_portugues" id="titulo_valores_portugues">
                                </div>
                                <div class="col-12 pb-2">
                                    <label><h5>Contenido</h5></label>
                                    <textarea class="form-control" value="" name="contenido" id="summernote_valores">{!! $formularioValores->contenido !!}</textarea>
                                </div>
                                <div class="col-12 pb-2">
                                    <label><h5>Contenido ingles</h5></label>
                                    <textarea class="form-control" value="" name="contenido_ingles" id="summernote_valores_ingles">{!! $formularioValores->contenido_ingles !!}</textarea>
                                </div>
                                <div class="col-12 pb-2">
                                    <label><h5>Contenido portugués</h5></label>
                                    <textarea class="form-control" value="" name="contenido_portugues" id="summernote_valores_portugues">{!! $formularioValores->contenido_portugues !!}</textarea>
                                </div>
                                <div class="col-12">
                                    <input type="hidden" class="form-control" value="valores" name="tipoformulario" id="tipoformulario">
                                </div>
                                <div class="col-12">
                                    <input type="hidden" class="form-control" value="{{$formularioValores->id}}" name="id" id="id">
                                </div>
                                <div class="col-12 pt-2 d-flex align-items-center justify-content-center">
                                    <button class="btn buttonFormularioQuienesSomos form-control" type="submmit">Actualizar</button>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
            </table>
        </div> 
        
        <div class="col-12 card">
            <table class="table">
                <thead class="card-head">
                    <th>
                        <h5>Editar calidad</h5>
                    </th>
                </thead>
                <tr class="card-body">
                    <td>
                        <form class="form-group" method="POST" action="">
                            @csrf @method('PUT')
                            <div class="row">
                                <div class="col-12 pb-2">
                                    <label> <h5>Titulo</h5> </label>
                                    <input type="text" class="form-control" name="titulo" id="titulo_calidad" value="{{$formularioCalidad->titulo}}">
                                </div>
                                <div class="col-12 pb-2">
                                    <label> <h5>Titulo ingles</h5> </label>
                                    <input type="text" class="form-control" name="titulo_ingles" id="titulo_calidad_ingles" value="{{$formularioCalidad->titulo_ingles}}">
                                </div>
                                <div class="col-12 pb-2">
                                    <label> <h5>Titulo portugués</h5> </label>
                                    <input type="text" class="form-control" name="titulo_portugues" id="titulo_calidad_portugues" value="{{$formularioCalidad->titulo_portugues}}">
                                </div>
                                <div class="col-12 pb-2">
                                    <label> <h5>Contenido</h5> </label>
                                    <textarea class="form-control" id="summernote_calidad" name="contenido">{!! $formularioCalidad->contenido !!}</textarea>
                                </div>
                                <div class="col-12 pb-2">
                                    <label> <h5>Contenido ingles</h5> </label>
                                    <textarea class="form-control" id="summernote_calidad_ingles" name="contenido_ingles">{!! $formularioCalidad->contenido_ingles !!}</textarea>
                                </div>
                                <div class="col-12">
                                    <label> <h5>Contenido portugués</h5> </label>
                                    <textarea class="form-control" id="summernote_calidad_portugues" name="contenido_portugues">{!! $formularioCalidad->contenido_portugues !!}</textarea>
                                </div>
                                <div class="col-12">
                                    <input class="form-control" name="id" id="id" value="{{$formularioCalidad->id}}" type="hidden">
                                </div>
                                <div class="col-12 d-flex align-items-center justify-content-center">
                                    <button class="btn buttonFormularioQuienesSomos form-control" type="submmit">Actualizar</button>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-12 card">
        <table class="table">
                <thead class="card-head">
                    <th>
                        <h5>Editar politicas de calidad</h5>
                    </th>
                </thead>
                <tr class="card-body">
                    <td>
                        <form class="form-group" method="POST" action="">
                            @csrf @method('PUT')
                            <div class="row">
                                <div class="col-12 pb-2">
                                    <label> <h5>Titulo</h5> </label>
                                    <input type="text" class="form-control" name="titulo" id="titulo_politicas" value="{{$formularioPoliticas->titulo}}">
                                </div>
                                <div class="col-12 pb-2">
                                    <label> <h5>Titulo ingles</h5> </label>
                                    <input type="text" class="form-control" name="titulo_ingles" id="titulo_politicas_ingles" value="{{$formularioPoliticas->titulo_ingles}}">
                                </div>
                                <div class="col-12 pb-2">
                                    <label> <h5>Titulo portugués</h5> </label>
                                    <input type="text" class="form-control" name="titulo_portugues" id="titulo_politicas_portugues" value="{{$formularioPoliticas->titulo_portugues}}">
                                </div>
                                <div class="col-12 pb-2">
                                    <label> <h5>Contenido</h5> </label>
                                    <textarea class="form-control" id="summernote_politicas" name="contenido">{!! $formularioPoliticas->contenido !!}</textarea>
                                </div>
                                <div class="col-12 pb-2">
                                    <label> <h5>Contenido ingles</h5> </label>
                                    <textarea class="form-control" id="summernote_politicas_ingles" name="contenido_ingles">{!! $formularioPoliticas->contenido_ingles !!}</textarea>
                                </div>
                                <div class="col-12">
                                    <label> <h5>Contenido portugués</h5> </label>
                                    <textarea class="form-control" id="summernote_politicas_portugues" name="contenido_portugues">{!! $formularioPoliticas->contenido_portugues !!}</textarea>
                                </div>
                                <div class="col-12">
                                    <input class="form-control" name="id" id="id" value="{{$formularioPoliticas->id}}" type="hidden">
                                </div>
                                <div class="col-12 d-flex align-items-center justify-content-center">
                                    <button class="btn buttonFormularioQuienesSomos form-control" type="submmit">Actualizar</button>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-12 card">
            <table class="table">
                <thead class="card-hrad">
                    <tr>
                        <th> <h5>Archivos anexos</h5> </th>
                        <th></th>
                        <th colspan="2" class="d-flex flex-row-reverse pr-4 pt-3 botonAgregar"> <a class="btn " data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus circule"></i></a> </th>
                    </tr>
                    <tr>
                        <th>Orden</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="card-body">
                    @if($archivos)
                        @foreach($archivos as $archivo)
                            <tr>
                                <td>
                                    {{$archivo->orden}}
                                </td>
                                <td>
                                    {!! $archivo->nombre !!}
                                </td>
                                <td>
                                    <div class="form-button-action">
                                        <a class="btn btn-link btn-primary btn-lg"  onclick="abrirModalEditar({{$archivo->id}})">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button class="btn btn-link btn-danger"  onclick="eliminarArchivo({{$archivo->id}})" >
                                            <i class="fa fa-times"></i>
                                        </button>        
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="col-12 card">
            <table class="table">
                <thead class="card-head">
                    <tr>
                        <th> <h5>Editar Historia</h5> </th>
                    </tr>
                <tbody class="card-body">
                    <td>
                        <form class="form-group" method="POST" action="">
                            @csrf @method('PUT')
                            <div cass="row">
                                <div class="col-12 pb-2">
                                    <label> <h5>Titulo</h5> </label>
                                    <input type="text" class="form-control" name="titulo" id="titulo_historia" value="{{$formularioHistoria->titulo}}">
                                </div>
                                <div class="col-12 pb-2">
                                    <label> <h5>Titulo ingles</h5> </label>
                                    <input type="text" class="form-control" name="titulo_ingles" id="titulo_hostoria_ingles" value="{{$formularioPoliticas->titulo_ingles}}">
                                </div>
                                <div class="col-12 pb-2">
                                    <label> <h5>Titulo portugués</h5> </label>
                                    <input type="text" class="form-control" name="titulo_portugues" id="titulo_historia_portugues" value="{{$formularioPoliticas->titulo_portugues}}">
                                </div>
                                <div class="col-12 pb-2">
                                    <label> <h5>Contenido</h5> </label>
                                    <textarea class="form-control" id="summernote_historia" name="contenido">{!! $formularioHistoria->contenido !!}</textarea>
                                </div>
                                <div class="col-12 pb-2">
                                    <label> <h5>Contenido ingles</h5> </label>
                                    <textarea class="form-control" id="summernote_historia_ingles" name="contenido_ingles">{!! $formularioHistoria->contenido_ingles !!}</textarea>
                                </div>
                                <div class="col-12">
                                    <label> <h5>Contenido portugués</h5> </label>
                                    <textarea class="form-control" id="summernote_historia_portugues" name="contenido_portugues">{!! $formularioHistoria->contenido_portugues !!}</textarea>
                                </div>
                                <div class="col-12">
                                    <input class="form-control" name="id" id="id" value="{{$formularioHistoria->id}}" type="hidden">
                                </div>
                                <div class="col-12 pt-3 d-flex align-items-center justify-content-center">
                                    <button class="btn buttonFormularioQuienesSomos form-control" type="submmit">Actualizar</button>
                                </div>
                            </div>
                        </form>
                    </td>
                </tbody>
            </table>
        </div>
        <div class="col-12 card">
            <table class="table">
                <thead class="card-head">
                    <tr>
                        <th> <h5>Editar Decadas</h5> </th>
                    </tr>
                </thead>
                <tbody class="card-body">
                        @foreach($formulariosDecadas as $formularioDecada)
                        <tr>
                            <td>
                            <form class="form-group" method="POST" action="">
                                @csrf @method('PUT')
                                <div cass="row">
                                    <div class="col-12 pb-2">
                                        <label> <h5>Titulo</h5> </label>
                                        <input type="text" class="form-control" name="titulo" id="titulo_decada" value="{{$formularioDecada->titulo}}">
                                    </div>
                                    <div class="col-12 pb-2">
                                        <label> <h5>Titulo ingles</h5> </label>
                                        <input type="text" class="form-control" name="titulo_ingles" id="titulo_decada_ingles" value="{{$formularioDecada->titulo_ingles}}">
                                    </div>
                                    <div class="col-12 pb-2">
                                        <label> <h5>Titulo portugués</h5> </label>
                                        <input type="text" class="form-control" name="titulo_portugues" id="titulo_decada_portugues" value="{{$formularioDecada->titulo_portugues}}">
                                    </div>
                                    <div class="col-12 pb-2">
                                        <label> <h5>Contenido</h5> </label>
                                        <textarea class="form-control" id="summernote_decada" name="contenido">{!! $formularioDecada->contenido !!}</textarea>
                                    </div>
                                    <div class="col-12 pb-2">
                                        <label> <h5>Contenido ingles</h5> </label>
                                        <textarea class="form-control" id="summernote_decada_ingles" name="contenido_ingles">{!! $formularioDecada->contenido_ingles !!}</textarea>
                                    </div>
                                    <div class="col-12">
                                        <label> <h5>Contenido portugués</h5> </label>
                                        <textarea class="form-control" id="summernote_decada_portugues" name="contenido_portugues">{!! $formularioDecada->contenido_portugues !!}</textarea>
                                    </div>
                                    <div class="col-12">
                                        <input class="form-control" name="id" id="id" value="{{$formularioDecada->id}}" type="hidden">
                                    </div>
                                    <div class="col-12 pt-3 d-flex align-items-center justify-content-center">
                                        <button class="btn buttonFormularioQuienesSomos form-control" type="submmit">Actualizar</button>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Archivo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-group" method="POST"  name="formularioArchivo" id="formularioArchivo" enctype="multipart/form-data">
          @csrf
            <div class="row">
                <div class="col-12">
                    <label>Orden</label>
                    <input type="text" name="archivo_orden" id="archivo_orden" class="form-control">
                </div>
                <div class="col-12 my-3">
                    <label>Archivo</label>
                    <input type="file" name="archivo" id="archivo" class="form-control-file">
                </div>
                <div class="col-12">
                    <label>Nombre del Archivo</label>
                    <input id="archivo" name="nombre_archivo" class="form-control">
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" >Guardar</button>
      </div>
        </form>
    </div>
  </div>
</div>
<!--Editar-->
<div class="modal fade" id="modaleditar" tabindex="-1" role="dialog" aria-labelledby="modaleditar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Editar Archivo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form  method="POST" id="actualizarArchivo" name="actualizarArchivo" enctype="multipart/form-data">
            @csrf @method('PATCH')
            <input type="hidden" name="id_editar" id="id_editar" value="">
        <div class="modal-body">
          <div class="row form-group">
            <div class="col-12">
				<label for="editar_orden">Orden</label>
				<input type="text" class="form-control" name="editar_orden" id="editar_orden" placeholder="">
            </div>
            <div class="col-12">
              <label>Archivo</label>
              <input class="form-control-file" type="file" name="editar_archivo" id="editar_archivo ">
            </div>
            <div class="col-12">
                <label>Nombre del archivo</label>
                <input type="text" id="edit_archivo" name="edit_nombre_archivo" class="form-control">
            </div>
            <div class="col-12">
                <input type="hidden" class="form-control" id="idArchivo" name="idArchivo">
            </div>
          </div>
          <br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submmit" class="btn btn-success">Editar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- -->

<script>
    //mision
    $(document).ready(function() {
         $('#summernote_mision').summernote();
    });
    $(document).ready(function() {
         $('#summernote_mision_ingles').summernote();
    });
    $(document).ready(function() {
         $('#summernote_mision_portugues').summernote();
    });
    //vision
    $(document).ready(function() {
         $('#summernote_vision').summernote();
    });
    $(document).ready(function() {
         $('#summernote_vision_ingles').summernote();
    });
    $(document).ready(function() {
         $('#summernote_vision_portugues').summernote();
    });
    //valores
    $(document).ready(function() {
         $('#summernote_valores').summernote();
    });
    $(document).ready(function() {
         $('#summernote_valores_ingles').summernote();
    });
    $(document).ready(function() {
         $('#summernote_valores_portugues').summernote();
    });
    //calidad
    $(document).ready(function() {
         $('#summernote_calidad').summernote();
    });
    $(document).ready(function() {
         $('#summernote_calidad_ingles').summernote();
    });
    $(document).ready(function() {
         $('#summernote_calidad_portugues').summernote();
    });
    //politicas
    $(document).ready(function() {
         $('#summernote_politicas').summernote();
    });
    $(document).ready(function() {
         $('#summernote_politicas_ingles').summernote();
    });
    $(document).ready(function() {
         $('#summernote_politicas_portugues').summernote();
    });

    //archivo
    $(document).ready(function() {
         $('#summernote_archivo').summernote();
    });
</script>
<script>

    //botones de Acciones
    function eliminarArchivo(id){
    swal({
        title: "Esta seguro/a de eliminar este Archivo?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            const url= location.pathname;
            $.ajax({
                type: "DELETE",
                url: url+"/archivo/"+id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    swal("Poof! Archivo Eliminado!","","success");
                      location.reload();
                },
                error: function(response){
                    swal("Algo salió mal","","error");
                }
            });

        } else {
          swal("No se borrado nada!");
        }
    });

    }

    function abrirModalEditar(id){
      $('#modaleditar').modal("show");
      const url = location.pathname;
      $.ajax({
        type: "get",
        url: url+"/archivo/editar/"+id,
        success: function (response) {
            $(document).ready(function() {
                $('#edit_archivo').val(response.nombre);
            });
            $('#editar_orden').val(response.orden);
            $('#editar_archivo').val(response.archivo);
            $('#idArchivo').attr('value', id);
        },
        error: function(response){
          
        }
      });
      $('#actualizarArchivo').attr("action", url+"/"+id);
    }

  
</script>
@endsection