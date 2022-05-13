@extends('admin.home')
@section('contenido')
    <div class="container-fluid mt-3">
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
                        Editar SubCategoria
                        <div class="float-right">
                            <a class="btn btn-outline-info" href="{{route('documentos-subcategorias.index')}}">
                                Volver
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('documentos-subcategorias.update',$subcategoria->id)}}" enctype="multipart/form-data" method="POST">
                            @method('PUT')
                            @csrf
                            <h6>Orden</h6>
                            <input type="text" class="form-control" name="orden" value="{{$subcategoria->orden}}">
                            {!!$errors->first('orden','<small class="text-danger">:message</small>')!!}
                            <h6>Titulo</h6>
                            <input type="text" class="form-control" name="titulo" value="{{$subcategoria->titulo}}">
                            {!!$errors->first('titulo','<small class="text-danger">:message</small>')!!}
                            <h6>Titulo Ingles</h6>
                            <input type="text" class="form-control" name="titulo_en" value="{{$subcategoria->titulo_en}}">
                            <h6>Titulo Portugues</h6>
                            <input type="text" class="form-control" name="titulo_pt" value="{{$subcategoria->titulo_pt}}">
                            <h6>Categoria</h6>
                            <select class="form-control" name="category_id">
                                @foreach ($categorias as $cat_select)
                                    @if ($cat_select->id==$subcategoria->category_id)
                                        <option value="{{$cat_select->id}}" selected>{{$cat_select->titulo}}</option>
                                    @else 
                                        <option value="{{$cat_select->id}}">{{$cat_select->titulo}}</option>
                                    @endif  
                                @endforeach
                            </select>   
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-info">
                                    Actualizar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection