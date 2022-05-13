@extends('admin.home')
@section('contenido')
    <script src="{{asset('js/ProductosArchivos.js')}}"></script>
    <div class="container my-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Editar Productos
                        <div class="float-right">
                            <a class="btn btn-outline-info" href="{{route('productos.create')}}">
                                <i class="fas fa-plus"></i>
                                Agregar Producto
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table text-center">
                            <thead>
                                <th>
                                    Titulo
                                </th>
                                <th>
                                    Acciones
                                </th>
                            </thead>
                            @foreach ($productos as $producto)
                            <tr>
                                <td>{{$producto->titulo}}</td>
                                <td>
                                    <div class="form-button-action">
                                          <a   class="btn btn-link btn-primary btn-lg" href="{{route('productos.edit',$producto->id)}}">
                                              <i class="fa fa-edit"></i>
                                          </a>
      
                                              <button    class="btn btn-link btn-danger"  onclick="eliminarProducto({{$producto->id}})" >
                                              <i class="fa fa-times"></i>
                                              </button>        
                                      </div>
                                  </td>
                            </tr>
                        @endforeach
                        </table>
                       
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Editar Archivos de Descarga
                        <div class="float-right">
                            <button class="btn btn-outline-info" data-toggle="modal" data-target="#modalAgregarArchivo">
                                <i class="fas fa-plus"></i>
                                Agregar Archivo
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>Orden</th>
                                <th>Nombre</th>
                                <th>Producto Asociado</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                @foreach ($descargas as $descarga)
                                    <tr>
                                        <td>{{$descarga->orden}}</td>
                                        <td>{{$descarga->nombre}}</td>
                                        <td>{{$descarga->producto->titulo}}</td>
                                        <td>
                                            <div class="form-button-action">
                                                  <a   class="btn btn-link btn-primary btn-lg" onclick="editarDescarga({{$descarga->id}})" data-toggle="modal" data-target="#modalEditarArchivo">
                                                      <i class="fa fa-edit"></i>
                                                  </a>
              
                                                      <button    class="btn btn-link btn-danger"  onclick="eliminarDescarga({{$descarga->id}})" >
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
            </div>
        </div>
    </div>
    <!-- Agregar Descarga -->
    <div class="modal fade" id="modalAgregarArchivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar Archivo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form  id="formAgregarDescarga" class="form-group"   enctype="multipart/form-data">
                @csrf
                <div class="row">
                        <div class="col-12">
                        <label>Orden:</label>
                        <input type="text" name="orden" id="orden" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label>Titulo en español:</label>
                            <input name="nombre" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label>Titulo en ingles:</label>   
                            <input name="titulo_en" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label>Titulo en portugués:</label>
                            <input  name="titulo_pt" class="form-control" required>
                        </div>
                        <div class="col-12 my-3">
                            <label>Archivo</label>
                            <input type="file" name="archivo" required>
                        </div>
                        <div class="col-md-12">
                            <h6>Producto Asociado</h6>
                            <select class="form-control" name="prod_id">
                                @foreach ($productos as $prod_select)
                                    <option value="{{$prod_select->id}}">{{$prod_select->titulo}}</option>
                                @endforeach
                            </select>
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
     <!-- Editar Descarga -->
     <div class="modal fade" id="modalEditarArchivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Archivo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form  id="formEditarDescarga" class="form-group"   enctype="multipart/form-data">
                @csrf
                <div class="row">
                        <div class="col-12">
                        <label>Orden:</label>
                        <input type="text" name="orden" id="orden_descarga" class="form-control">
                        </div>
                        <div class="col-12">
                            <input type="hidden" id="id_descarga">
                            <label>Titulo en español:</label>
                            <input name="nombre" class="form-control" id="nombre">
                        </div>
                        <div class="col-12">
                            <label>Titulo en ingles:</label>   
                            <input name="titulo_en" class="form-control" id="titulo_en">
                        </div>
                        <div class="col-12">
                            <label>Titulo en portugués:</label>
                            <input  name="titulo_pt" class="form-control" id="titulo_pt">
                        </div>
                        <div class="col-12 my-3">
                            <label>Archivo</label>
                            <input type="file" name="archivo_edit">
                        </div>
                        <div class="col-md-12">
                            <h6>Producto Asociado</h6>
                            <select class="form-control" name="prod_id" id="select_producto">
                                @foreach ($productos as $prod_select)
                                    <option value="{{$prod_select->id}}">{{$prod_select->titulo}}</option>
                                @endforeach
                            </select>
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
    <script>
        function eliminarProducto(id){
            swal({
                title: "Esta seguro/a de eliminar esta Producto?",
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
                            swal("Poof! Producto Eliminado!","","success");
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
        function eliminarDescarga(id){
            swal({
                title: "Esta seguro/a de eliminar esta Descarga?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    const url= location.pathname;
                    $.ajax({
                        type: "DELETE",
                        url: url+"/eliminarDescarga/"+id,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            swal("Poof! Descarga Eliminado!","","success");
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
    </script>
@endsection