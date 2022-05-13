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
                        <form action="{{route('productos.store')}}" method="POST">
                            @csrf 
                            <div class="row">
                                <div class="col-md-12">
                                    <h6>Titulo</h6>
                                    <input type="text" class="form-control" name="titulo">
                                </div>
                                <div class="col-md-12">
                                    <h6>Texto</h6>
                                    <textarea name="texto"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <h6>Texto Ingles</h6>
                                    <textarea name="texto_en"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <h6>Texto Portugues</h6>
                                    <textarea name="texto_pt"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <h6>Categoria</h6>
                                    <select class="form-control" name="category_id">
                                        @foreach ($categorias as $cat_select)
                                            <option value="{{$cat_select->id}}">{!!$cat_select->titulo!!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-info">
                                        Agregar
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