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
                <div class="card">
                    <div class="card-header">
                        Agregar Script 
                        <div class="float-right">
                            <a class="btn btn-outline-info" href="{{route('scripts.index')}}">
                                Volver
                            </a>
                        </div>
                        <div class="card-body">
                            <form action="{{route('scripts.update',$script->id)}}" method="POST">
                                @method('PUT')
                                @csrf
                                <h6>Nombre</h6>
                                <input type="text" class="form-control" name="nombre" value="{{$script->nombre}}">
                                <h6>Seccion</h6>
                                <select class="form-control" name="seccion">
                                    <optgroup>
                                        @if ($script->seccion==='header')
                                        <option value="header" selected>Header</option>
                                        <option value="body">Body</option>
                                        @else 
                                        <option value="header">Header</option>
                                        <option value="body" selected>Body</option>
                                        @endif
                                    </optgroup>
                                </select>
                                <h6>Script</h6>
                                <input type="text" class="form-control" name="script" value="{{$script->script}}">
                                <button type="submit" class="btn btn-info mt-5">
                                    Actualizar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
@endsection