@extends('admin.home')
@section('contenido')
    <script src="{{asset('js/Documentos.js')}}"></script>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Editar Documentos
                        <div class="float-right">
                            <button class="btn btn-outline-info" data-toggle="modal" data-target="#modalAgregarDocumento">
                                <i class="fas fa-plus"></i>
                                Agregar Documento
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>Orden</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                @foreach ($documentos as $documento)
                                    <tr>
                                        <td>{{$documento->orden}}</td>
                                        <td>{{$documento->nombre}}</td>
                                        <td>
                                            <div class="form-button-action">
                                                  <a   class="btn btn-link btn-primary btn-lg" onclick="editarDocumento({{$documento->id}})" data-toggle="modal" data-target="#modalEditarDocumento">
                                                      <i class="fa fa-edit"></i>
                                                  </a>
              
                                                      <button    class="btn btn-link btn-danger"  onclick="eliminarDocumento({{$documento->id}})" >
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
     <!-- Agregar Documento -->
     <div class="modal fade" id="modalAgregarDocumento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar Documento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form  id="formAgregarDocumento" class="form-group"   enctype="multipart/form-data">
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
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="cat-sub" value="1">
                            <label class="form-check-label" for="exampleRadios1">
                              Categorias
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="cat-sub"  value="2">
                            <label class="form-check-label" for="exampleRadios2">
                             SubCategorias
                            </label>
                          </div>
                        <div class="col-md-12 mt-3 d-none" id="Categorias" >
                            <h6>Categorias</h6>
                            <select class="form-control" id="select_cats"  name="category_id">
                            <option disabled selected>Seleccione categoria</option>
                            @forelse ($categorias as $cat_select)
                                <option value="{{$cat_select->id}}">{{$cat_select->titulo}}</option>
                            @empty
                            <option value="" disabled selected>No hay categorias cargadas</option>
                            @endforelse
                            </select>
                            {!!$errors->first('category_id','<small class="text-danger">:message</small>')!!}
                        </div>
                        <div class="col-md-12 mt-3 d-none" id="SubCategorias" >
                            <h6>SubCategorias</h6>
                            <select class="form-control " id="select_subcats"  name="subcategory_id" >
                            <option disabled selected>Seleccione SubCategoria</option>
                            @forelse ($subcategorias as $subcat_select)
                                <option value="{{$subcat_select->id}}">{{$subcat_select->titulo}}</option>
                            @empty
                            <option value="" disabled selected>No hay SubCategorias cargadas</option>
                            @endforelse
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
     <!-- Editar Documento -->
     <div class="modal fade" id="modalEditarDocumento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Documento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form  id="formEditarDocumento" class="form-group"   enctype="multipart/form-data">
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
                        <div class="form-check">
                            {{-- @if ($producto->category_id!=null)
                            <input class="form-check-input" type="radio" name="cat-sub" id="exampleRadios1" value="1" checked>
                            @else
                            <input class="form-check-input" type="radio" name="cat-sub" id="exampleRadios1" value="1">
                            @endif --}}
                            <input class="form-check-input" type="radio" name="cat-subEdit" id="exampleRadios1" value="1">
                            <label class="form-check-label" for="exampleRadios1">
                              Categorias
                            </label>
                          </div>
                          <div class="form-check">
                              {{-- @if ($producto->subcategory_id!=null)
                              <input class="form-check-input" type="radio" name="cat-sub" id="exampleRadios2" value="2" checked>
                              @else 
                              <input class="form-check-input" type="radio" name="cat-sub" id="exampleRadios2" value="2">

                              @endif --}}
                              <input class="form-check-input" type="radio" name="cat-subEdit" id="exampleRadios2" value="2">
                            <label class="form-check-label" for="exampleRadios2">
                             SubCategorias
                            </label>
                          </div>
                        <div class="col-md-12 mt-3 d-none " id="CategoriasEdit">
                            <h6>Categorias</h6>
                            <select class="form-control"  id="select_cats_edit" name="category_id" >
                            <option value="" selected>Seleccione categoria</option>
                            @forelse ($categorias as $cat_select)
                            <option value="{{$cat_select->id}}">{{$cat_select->titulo}}</option>
                                {{-- @if ($producto->category_id==$cat_select->id)
                                <option value="{{$cat_select->id}}" selected>{{$cat_select->titulo}}</option>
                                @else
                                <option value="{{$cat_select->id}}">{{$cat_select->titulo}}</option>
                                @endif --}}
                               
                            @empty
                            <option value=""  selected>No hay categorias cargadas</option>
                            @endforelse
                            </select>
                            {!!$errors->first('category_id','<small class="text-danger">:message</small>')!!}
                        </div>
                        <div class="col-md-12 mt-3 d-none" id="SubCategoriasEdit" >
                            <h6>SubCategorias</h6>
                            <select class="form-control " id="select_subcats_edit"  name="subcategory_id" >
                            <option value="" selected>Seleccione SubCategoria</option>
                            @forelse ($subcategorias as $subcat_select)
                                {{-- @if ($subcat_select->id==$producto->subcategory_id)
                                <option value="{{$subcat_select->id}}" selected>{{$subcat_select->titulo}}</option>
                                @else 
                                <option value="{{$subcat_select->id}}">{{$subcat_select->titulo}}</option>
                                @endif --}}
                                <option value="{{$subcat_select->id}}" selected>{{$subcat_select->titulo}}</option>

                            @empty
                            <option value="" selected>No hay SubCategorias cargadas</option>
                            @endforelse
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
            $('input[name=cat-sub]').on('change',(e)=>{
                if(e.target.value==1){
                    $('#Categorias').removeClass('d-none');
                    $('#select_cats').prop('required',true);
                    $('#SubCategorias').addClass('d-none');
                    $('#select_subcats').prop('required',false);
                    $('#select_subcats').prop('checked',false);
                    $('#select_subcats').val('');
                    //$('#select_subcats').change();
                }
                if(e.target.value==2){
                    $('#Categorias').addClass('d-none');
                    $('#select_cats').prop('required',false);
                    $('#select_cats').prop('checked',false);
                    $('#SubCategorias').removeClass('d-none');
                    $('#select_subcats').prop('required',true);
                    $('#select_cats').val('').attr('selectd',true);
                   // $('#select_cats').change();
                }
            });
            $('input[name=cat-subEdit]').on('change',(e)=>{
                if(e.target.value==1){
                    $('#CategoriasEdit').removeClass('d-none');
                    $('#select_cats_edit').prop('required',true);
                    $('#SubCategoriasEdit').addClass('d-none');
                    $('#select_subcats_edit').prop('required',false);
                    $('#select_subcats_edit').prop('checked',false);
                    $('#select_subcats_edit').val('');
                    //$('#select_subcats').change();
                }
                if(e.target.value==2){
                    $('#CategoriasEdit').addClass('d-none');
                    $('#select_cats_edit').prop('required',false);
                    $('#select_cats_edit').prop('checked',false);
                    $('#SubCategoriasEdit').removeClass('d-none');
                    $('#select_subcats_edit').prop('required',true);
                    $('#select_cats_edit').val('').attr('selectd',true);
                   // $('#select_cats').change();
                }
            });
    </script>
@endsection