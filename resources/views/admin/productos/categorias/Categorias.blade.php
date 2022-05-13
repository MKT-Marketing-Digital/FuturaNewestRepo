@extends('admin.home')
@section('contenido')
<div class="container px-2">
    <div class="row agregarCategoria">
        <div class="col-12 d-flex flex-row-reverse pr-4 pt-3 botonAgregar">
            <a class="btn" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus circule"></i></a>
        </div>
    <div>
</div>
<div class="container mx-4 mt-3">
    <div class="row">
        @if(isset($categorias))
              <div class="col-12 card">
                  <div class="card-body">
                      <table class="table">
                        <thead>
                          <tr>
                              <th>Orden</th>
                              <th>Imagen</th>
                              <th>Titulo</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($categorias as $categoria)
                          <tr>
                                <td>
                                  {{$categoria->orden}}
                                </td>
                                <td>
                                  <img class="img-fluid" width="100px" src="{{asset(Storage::url($categoria->imagen))}}">
                                </td>
                                <td>
                              <div>{!!$categoria->titulo!!}</div>
                            </td>
                            <td>
                              <div class="form-button-action">
                                    <a   class="btn btn-link btn-primary btn-lg"  onclick="abrirModalEditar({{$categoria->id}})">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                        <button    class="btn btn-link btn-danger"  onclick="eliminarCategoria({{$categoria->id}})" >
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
        <h5 class="modal-title" id="exampleModalLabel">Nueva Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" class="form-group" name="formularioCategoria" id="formularioCategoria" enctype="multipart/form-data">
          @csrf
            <div class="row">
                <div class="col-12">
                    <label>Orden:</label>
                    <input type="text" name="orden" id="orden" class="form-control">
                </div>
                <div class="col-12 my-3">
                    <label>Imagen:</label>
                    <input type="file" name="imagen" id="imagen" class="form-control-file">
                </div>
                <div class="col-12">
                    <label>Titulo en español:</label>
                    <input type="text" id="summernote_es" name="titulo" class="form-control">
                </div>
                <div class="col-12">
                    <label>Titulo en ingles:</label>   
                    <input type="text" id="summernote_en" name="titulo_en" class="form-control">
                </div>
                <div class="col-12">
                    <label>Titulo en portugués:</label>
                    <input type="text" id="summernote_pt" name="titulo_pt" class="form-control">
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
          <h5 class="modal-title" id="exampleModalCenterTitle">Editar Categoria</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form  method="POST" id="actualizarCategoria" name="actualizarCategoria" enctype="multipart/form-data">
          @csrf @method('PATCH')  
        <input type="hidden" name="id_editar" id="id_editar" value="">
        <div class="modal-body">
            <div class="row form-group">
                <div class="col-12">
					<label>Orden</label>
				    <input type="text" class="form-control" name="editar_orden" id="editar_orden" placeholder="">
                </div>
                <div class="col-12">
                <label>Imagen</label>
                <img id="preview-img" class="img-fluid" src=""> 
                <input class="form-control-file" type="file" name="editar_imagen" id="editar_imagen">
                </div>
                <div class="col-12">
                    <label>Titulo en español:</label>
                    <input id="edit_summernote_es" name="edit_titulo" class="form-control" type ="text">
                </div>
                <div class="col-12">
                    <label>Titulo en ingles:</label>   
                    <input type="text" id="edit_summernote_en" name="edit_titulo_en" class="form-control">
                </div>
                <div class="col-12">
                    <label>Titulo en portugués:</label>
                    <input type="text" id="edit_summernote_pt" name="edit_titulo_pt" class="form-control">
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
    function eliminarCategoria(id){
    swal({
        title: "Esta seguro/a de eliminar esta Categoria?",
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
                    swal("Poof! Categoria Eliminado!","","success");
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
          $('#edit_summernote_es').val(response.titulo);
          $('#edit_summernote_en').val(response.titulo_en);
          $('#edit_summernote_pt').val(response.titulo_pt);
          $('#id_editar').val(id);
          $('#editar_orden').val(response.orden);
          $('#preview-img').attr('src','/storage/'+response.imagen);
        },
        error: function(response){
          
        }
      });
      $('#actualizarCategoria').attr("action", url+"/"+id);
    }

  
</script>
@endsection