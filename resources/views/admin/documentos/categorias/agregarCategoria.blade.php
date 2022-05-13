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
                        Agregar Categoria
                        <div class="float-right">
                            <a class="btn btn-outline-info" href="{{route('documentos-categorias.index')}}">
                                Volver
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('documentos-categorias.store')}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <h6>Orden</h6>
                            <input type="text" class="form-control" name="orden">
                            {!!$errors->first('orden','<small class="text-danger">:message</small>')!!}
                            <h6>Titulo</h6>
                            <input type="text" class="form-control" name="titulo">
                            <h6>Titulo Ingles</h6>
                            <input type="text" class="form-control" name="titulo_en">
                            <h6>Titulo Portugues</h6>
                            <input type="text" class="form-control" name="titulo_pt">
                            {!!$errors->first('titulo','<small class="text-danger">:message</small>')!!}                         
                            <div class="col-md-12 text-center mt-5">
                                <button type="submit" class="btn btn-info">
                                    Agregar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection