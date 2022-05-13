@extends('admin.home')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Editar Scripts
                        <div class="float-right">
                            <a class="btn btn-outline-info" href="{{route('scripts.create')}}">
                                <i class="fas fa-plus"></i>
                                Agregar Script
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>Nombre</th>
                                <th>Seccion</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                @foreach ($scripts as $script)
                                    <tr>
                                        <td>{{$script->nombre}}</td>
                                        <td>{{$script->seccion}}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a class="btn btn-link btn-primary btn-lg" href="{{route('scripts.edit',$script->id)}}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button class="btn btn-link btn-danger"  onclick="eliminarScript({{$script->id}})" >
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
    <script>
           function eliminarScript(id){
            swal({
                title: "Esta seguro/a de eliminar este Script?",
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
                            swal("Poof! Script Eliminado!","","success");
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