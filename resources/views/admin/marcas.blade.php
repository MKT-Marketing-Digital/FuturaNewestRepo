@extends('admin.home')
@section('contenido')
<div class="container py-2">
    <div class="row agregarMarca">
        <div class="col-12 d-flex flex-row-reverse pr-4 pt-3 botonAgregar">
            <a class="btn" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus circule"></i></a>
        </div>
    <div>
</div>
<div class="container py-4 px-4">
    <div class="row">  
        @if(isset($marcas) && $marcas)
              <div class="col-12 card">
                  <div class="card-body">
                      <table class="table" style="width:100%;">
                        <thead>
                          <tr>
                            <th colspan="2">Imagen</th>
                            <th>Texto</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($marcas as $marca)
                          <tr>
                            <td colspan="2">
                              <img class="img-fluid" width="100px" src="{{asset(Storage::url($marca->imagen))}}">
                            </td>
                            <td>
                              <div>{!!$marca->nombre!!}</div>
                            </td>
                            <td>
                              <div class="form-button-action">
                                    <a   class="btn btn-link btn-primary btn-lg"  onclick="abrirModalEditar({{$marca->id}})">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                        <button    class="btn btn-link btn-danger"  onclick="eliminarMarca({{$marca->id}})" >
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
        <h5 class="modal-title" id="exampleModalLabel">Nueva Marca</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" class="form-group" name="formularioMarca" id="formularioMarca" enctype="multipart/form-data">
          @csrf
            <div class="row">
                <div class="col-12 my-3">
                    <label>Imagen:</label>
                    <input type="file" name="imagen_marca" id="imagen_marca" class="form-control-file">
                </div>
                <div class="col-12">
                    <label>Nombre:</label>
                    <input type="text" id="summernote_marca" name="descripcion_marca" class="form-control">
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
          <h5 class="modal-title" id="exampleModalCenterTitle">Editar Marca</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form  method="POST" id="actualizarMarca" name="actualizarMarca" enctype="multipart/form-data">
          @csrf
        <div class="modal-body">
          <div class="row form-group">
            <input type="hidden" name="id_editar_marca" id="id_editar_marca" value="">
              <div class="col-12">
              <label>Imagen</label>
              <img id="preview-img-marca" class="img-fluid" src=""> 
              <input class="form-control-file" type="file" name="editar_imagen" id="editar_imagen">
              </div>
              <div class="col-12">
                    <label>Nombre:</label>
                    <input type="text" id="edit_summernote_marca" name="edit_summernote_marca" class="form-control">
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
    //botones de Acciones
    function eliminarMarca(id){
    swal({
        title: "Esta seguro/a de eliminar esta Marca?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            const url= location.pathname;
            $.ajax({
                type: "DELETE",
                url: url+"/eliminar/"+id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    swal("Poof! Marca Eliminada!","","success");
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
        url: url+"/editar/"+id,
        success: function (response) {
            $(document).ready(function() {
              $('#edit_summernote_marca').val(response.nombre);
            });
          $('#id_editar_marca').val(id);
          $('#preview-img-marca').attr('src','/storage/'+response.imagen);
        },
        error: function(response){ 
        }
      });
      $('#actualizarMarca').attr("action", url+"/"+id);
    }
</script>
@endsection