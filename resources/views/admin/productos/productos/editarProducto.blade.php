@extends('admin.home')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{session()->get('error')}}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        Agregar Producto 
                        <div class="float-right">
                            <a class="btn btn-outline-info" href="{{route('productos.index')}}">
                                Volver
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('productos.update',$producto->id)}}" method="POST">
                            @csrf 
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <h6>Titulo</h6>
                                    <input type="text" class="form-control" name="titulo" value="{{$producto->titulo}}">
                                </div>
                                <div class="col-md-12">
                                    <h6>Texto</h6>
                                    <textarea name="texto">{!!$producto->texto!!}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <h6>Texto Ingles</h6>
                                    <textarea name="texto_en">{!!$producto->texto_en!!}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <h6>Texto Portugues</h6>
                                    <textarea name="texto_pt">{!!$producto->texto_pt!!}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <h6>Categoria</h6>
                                    <select class="form-control" name="category_id">
                                        @foreach ($categorias as $cat_select)
                                            @if ($cat_select->id==$producto->category_id)
                                            <option value="{{$cat_select->id}}" selected>{!!$cat_select->titulo!!}</option>
                                            @else
                                            <option value="{{$cat_select->id}}">{!!$cat_select->titulo!!}</option>
                                            @endif
                                            
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-info">
                                        Actualizar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>  
            </div>
        </div>
    </div>
    <script>
         $(document).ready(function() {
         $('textarea').summernote({
             height:180,
         });
        });
    </script>
@endsection