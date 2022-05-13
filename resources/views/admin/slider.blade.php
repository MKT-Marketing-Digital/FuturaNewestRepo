@extends('admin.home')
@section('contenido') 

<div class="container py-2">
    <div class="row agregarSlide">
        <div class="col-12 d-flex flex-row-reverse pr-4 pt-3 botonAgregar">
            <a class="btn" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus circule"></i></a>
        </div>
    <div>
</div>
<div class="container py-4 px-4">
    <div class="row">  
        @if(isset($sliders))
              <div class="col-12 card">
                  <div class="card-body">
                      <table class="table">
                        <thead>
                          <tr>
                            <th colspan="2">Imagen</th>
                            <th>Orden</th>
                            <th>Texto</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($sliders as $slider)
                          <tr>
                            <td colspan="2">
                              <img class="img-fluid" width="100px" src="{{asset(Storage::url($slider->imagen))}}">
                            </td>
                            <td>
                              {{$slider->orden}}
                            </td>
                            <td>
                              <div>{!!$slider->texto!!}</div>
                            </td>
                            <td>
                              <div class="form-button-action">
                                    <a   class="btn btn-link btn-primary btn-lg"  onclick="abrirModalEditar({{$slider->id}})">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                        <button    class="btn btn-link btn-danger"  onclick="eliminarSlider({{$slider->id}})" >
                                        <i class="fa fa-times"></i>
                                        </button>        
                                </div>
                            </td>
                          </tr>
                        @endforeach   
                        </tbody>
                      </table>
                  </div>
              </div>
        @endif
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo slider</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" class="form-group" name="formularioSlider" id="formularioSlider" enctype="multipart/form-data">
          @csrf
            <div class="row">
                <div class="col-12">
                    <label>Orden:</label>
                    <input type="text" name="slider_orden" id="slider_orden" class="form-control">
                </div>
                <div class="col-12 my-3">
                    <label>Imagen:</label>
                    <input type="file" name="imagen_slider" id="imagen_slider" class="form-control-file">
                </div>
            	<div class="col-12 my-3">
                    <label>Imagen ingles:</label>
                    <input type="file" name="imagen_slider_ingles" id="imagen_slider_ingles" class="form-control-file">
                </div>
            	<div class="col-12 my-3">
                    <label>Imagen portugues:</label>
                    <input type="file" name="imagen_slider_portugues" id="imagen_slider_portugues" class="form-control-file">
                </div>
                <div class="col-12">
                  @php
                      $urlActual=parse_url(Request::url());
                  @endphp
                 
                  @switch($urlActual['path'])
                  @case( '/home/adm/sliders/inicio') 
                    <input type="hidden" class="form-control" name="pagina" value="inicio">
                  @break   
                  @case('/home/adm/sliders/quienes-somos')
                    <input type="hidden" class="form-control" name="pagina" value="quienes-somos">
                  @break
                  @case('/home/adm/sliders/productos') 
                      <input type="hidden" class="form-control" name="pagina" value="productos">
                  @break
                  @case('/home/adm/sliders/distribuidores')
                    <input type="hidden" class="form-control" name="pagina" value="distribuidores">
                  @break
                  @case('/home/adm/sliders/servicios')
                    <input type="hidden" class="form-control" name="pagina" value="servicios">
                  @break
                  @case('/home/adm/sliders/documentos')
                    <input type="hidden" class="form-control" name="pagina" value="documentos">
                  @break
                  @case('/home/adm/sliders/contacto')
                    <input type="hidden" class="form-control" name="pagina" value="contacto">
                  @break
                  @default
                    <input type="hidden" class="form-control" name="pagina" value="">
                  @endswitch
                </div>
                <div class="col-12">
                    <label>Texto en español:</label>
                    <textarea type="text" id="summernote_es" name="descripcion_es"></textarea>
                </div>
                <div class="col-12">
                    <label>Texto en ingles:</label>   
                    <textarea type="text" id="summernote_en" name="descripcion_en"></textarea>
                </div>
                <div class="col-12">
                    <label>Texto en portugués:</label>
                    <textarea type="text" id="summernote_pt" name="descripcion_pt"></textarea>
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
          <h5 class="modal-title" id="exampleModalCenterTitle">Editar Slide</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <input type="hidden" value="home/adm/sliders/">
        <form  method="POST" id="actualizarslider" enctype="multipart/form-data">
          @csrf 
		      @method('PUT')
          
          @switch($urlActual['path'])
                  @case( '/home/adm/sliders/inicio') 
                    <input type="hidden" class="form-control" name="pagina" value="inicio">
                  @break   
                  @case('/home/adm/sliders/quienes-somos')
                    <input type="hidden" class="form-control" name="pagina" value="quienes-somos">
                  @break
                  @case('/home/adm/sliders/productos') 
                      <input type="hidden" class="form-control" name="pagina" value="productos">
                  @break
                  @case('/home/adm/sliders/distribuidores')
                    <input type="hidden" class="form-control" name="pagina" value="distribuidores">
                  @break
                  @case('/home/adm/sliders/servicios')
                    <input type="hidden" class="form-control" name="pagina" value="servicios">
                  @break
                  @case('/home/adm/sliders/documentos')
                    <input type="hidden" class="form-control" name="pagina" value="documentos">
                  @break
                  @case('/home/adm/sliders/contacto')
                    <input type="hidden" class="form-control" name="pagina" value="contacto">
                  @break
                  @default
                    <input type="hidden" class="form-control" name="pagina" value="">
                  @endswitch

        <div class="modal-body">
          <div class="row form-group">
            <div class="col-12">
							<label for="email2">Orden</label>
							<input type="text" class="form-control" name="editar_orden" id="editar_orden" placeholder="">
              </div>
              <div class="col-12">
              	<label>Imagen</label>
              	<img id="preview-img" class="img-fluid" src=""> 
              	<input class="form-control-file" type="file" name="editar-imagen" id="editar-imagen">
              </div>
           	  <div class="col-12">
              	<label>Imagen ingles</label>
              	<img id="preview-img-ingles" class="img-fluid" src=""> 
              	<input class="form-control-file" type="file" name="editar_imagen_slider_ingles" id="editar_imagen_slider_ingles">
              </div>
          	  <div class="col-12">
              	<label>Imagen portugues</label>
              	<img id="preview-img-portugues" class="img-fluid" src=""> 
              	<input class="form-control-file" type="file" name="editar_imagen_slider_portugues" id="editar_imagen_slider_portugues">
              </div>
              <div class="col-12">
                    <label>Texto en español:</label>
                    <textarea type="text" id="edit_summernote_es" name="edit_descripcion_es"></textarea>
                </div>
                <div class="col-12">
                    <label>Texto en ingles:</label>   
                    <textarea type="text" id="edit_summernote_en" name="edit_descripcion_en"></textarea>
                </div>
                <div class="col-12">
                    <label>Texto en portugués:</label>
                    <textarea id="edit_summernote_pt" name="edit_descripcion_pt"></textarea>
                </div>

          </div>
          <br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success">Editar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- -->
<script>
  $(function(){
    $('textarea').summernote({
                height:180,
    });
  });
    //botones de Acciones
    function eliminarSlider(id){
    swal({
        title: "Esta seguro/a de eliminar este Slider?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            const url= location.pathname;
            $.ajax({
                type: "DELETE",
                url: url+"/"+id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    swal("Poof! Slider Eliminado!","","success");
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
      console.log(url);
      $.ajax({
        type: "get",
        url: url+"/editar/"+id,
        success: function (response) {
          $('#edit_summernote_es').summernote('code',response.texto);
          $('#edit_summernote_en').summernote('code',response.descripcion_en);
          $('#edit_summernote_pt').summernote('code',response.descripcion_pt);
          $('#id_editar').val(id);
          $('#editar_orden').val(response.orden);
          $('#preview-img').attr('src','/storage/'+response.imagen);
          $('#preview-img-ingles').attr('src','/storage/'+response.imagen_ingles);
          $('#preview-img-portugues').attr('src','/storage/'+response.imagen_portugues);
        },
        error: function(response){
          
        }
      });
      $('#actualizarslider').attr("action", "/home/adm/sliders"+"/"+id);
    }

  
</script>
        
@endsection