@extends('admin.home')
@section('contenido') 

<div class="container py-2">
    <div class="row agregarLogo">
        <div class="col-12 d-flex flex-row-reverse pr-4 pt-3 botonAgregar">
            <a class="btn" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus circule"></i></a>
        </div>
    <div>
</div>
<div class="container py-4 px-4">
    <div class="row">  
        @if(isset($logos))
              <div class="col-12 card">
                  <div class="card-body">
                      <table class="table">
                        <thead>
                          <tr>
                            <th colspan="2">Imagen</th>
                            <th>Descripcion</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($logos as $logo)
                          <tr>
                            <td colspan="2">
                              <img class="img-fluid" width="100px" src="{{asset(Storage::url($logo->icono))}}">
                            </td>
                            <td>
                              <div>{{$logo->descripcion}}</div>
                            </td>
                            <td>
                              <div class="form-button-action">
                                    <a   class="btn btn-link btn-primary btn-lg"  onclick="abrirModalEditar({{$logo->id}})">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                        <button    class="btn btn-link btn-danger"  onclick="eliminarLogo({{$logo->id}})" >
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
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Logo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" class="form-group" name="formularioLogo" id="formularioLogo" enctype="multipart/form-data">
          @csrf
            <div class="row">
                <div class="col-12 my-3">
                    <label>Imagen:</label>
                    <input type="file" name="imagen" id="imagen" class="form-control-file">
                </div>
            	<div class="col-12 my-3">
                    <label>Imagen ingles:</label>
                    <input type="file" name="imagen_ingles" id="imagen_ingles" class="form-control-file">
                </div>
            	<div class="col-12 my-3">
                    <label>Imagen portugues:</label>
                    <input type="file" name="imagen_portugues" id="imagen_portugues" class="form-control-file">
                </div>
                <div class="col-12">
                    <label>Descripcion:</label>
                    <input type="text" id="descripcion" name="descripcion" class="form-control">
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
          <h5 class="modal-title" id="exampleModalCenterTitle">Editar Logo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form  method="POST" id="actualizarLogo" name="actualizarLogo" enctype="multipart/form-data">
            @csrf @method('PATCH')
            <div class="modal-body">
                <div class="row form-group">
                    <div class="col-12">
                        <label>Imagen</label>
                        <img id="preview-img" class="img-fluid" src=""> 
                        <input class="form-control-file" type="file" name="editar_imagen" id="editar_imagen">
                    </div>
                	<div class="col-12">
                        <label>Imagen ingles</label>
                        <img id="preview-img-ingles" class="img-fluid" src=""> 
                        <input class="form-control-file" type="file" name="editar_imagen_ingles" id="editar_imagen_ingles">
                    </div>
                	<div class="col-12">
                        <label>Imagen portugues</label>
                        <img id="preview-img-portugues" class="img-fluid" src=""> 
                        <input class="form-control-file" type="file" name="editar_imagen_portugues" id="editar_imagen_portugues">
                    </div>
                    <div class="col-12">
                        <label>descripcion</label>
                        <input type="text" id="descripcion_editar" name="descripcion_editar" class="form-control">
                    </div>
                    <div class="col-12">
                        <input type="hidden" name="id_editar" id="id_editar" class="form-controll">
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
    function eliminarLogo(id){
    swal({
        title: "Esta seguro/a de eliminar este Logo?",
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
                    swal("Poof! Logo Eliminado!","","success");
                      location.reload();
                },
                error: function(response) {
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
            $('#id_editar').val(id);
            $('#descripcion_editar').val(response.descripcion);
            $('#preview-img').attr('src','/storage/'+response.icono);
        	$('#preview-img-ingles').attr('src','/storage/'+response.icono_ingles);
        	$('#preview-img-portugues').attr('src','/storage/'+response.icono_portugues);
        },
        error: function(response) {
                
        }
      });
      $('#actualizarLogo').attr("action", url+"/"+id);
    }

  
</script>
        
@endsection