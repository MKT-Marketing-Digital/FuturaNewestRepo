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
                            <form action="{{route('scripts.store')}}" method="POST">
                                @csrf
                                <h6>Nombre</h6>
                                <input type="text" class="form-control" name="nombre" required>
                                <h6>Seccion</h6>
                                <select class="form-control" name="seccion" required>
                                    <optgroup>
                                        <option value="header">Header</option>
                                        <option value="body">Body</option>
                                    </optgroup>
                                </select>
                                <h6>Script</h6>
                                <input type="text" class="form-control" name="script" required>
                                <button type="submit" class="btn btn-info mt-5">
                                    Agregar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
@endsection