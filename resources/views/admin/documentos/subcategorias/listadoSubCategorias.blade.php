@extends('admin.home')
@section('contenido')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Editar SubCategorias
                    <div class="float-right">
                        <a class="btn btn-outline-info" href="{{route('documentos-subcategorias.create')}}">
                            <i class="fas fa-plus">
                            </i>
                            Agregar SubCategoria
                        </a>
                    </div>
                </div>  
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>Orden</th>
                            <th>Titulo</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                            @foreach ($subcategorias as $subcat)
                            <tr>
                            <td>{{$subcat->orden}}</td>
                            <td>{{$subcat->titulo}}</td>
                            <td>
                                <div class="form-button-action">
                                    <a   class="btn btn-link btn-primary btn-lg" href="{{route('documentos-subcategorias.edit',$subcat->id)}}">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                        <button    class="btn btn-link btn-danger"  onclick="eliminarCategoria({{$subcat->id}})" >
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
        function eliminarCategoria(id){
    swal({
        title: "Esta seguro/a de eliminar una Categoria?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            const url= location.href;
            $.ajax({
                type: "DELETE",
                url: url+"/"+id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    /*swal("Poof! Categoria Eliminada!","","success");
                      setTimeout(function(){location.reload()},1500);*/
                      if(response==false){
                          swal("No se puede eliminar una Categoria con Productos Asociados","Elimine los productos primero","warning");
                      }
                      if(response==true){
                        swal("Poof! Categoria Eliminada!","","success");
                        setTimeout(function(){location.reload()},1500);
                      }
                },
                error: function(response){
                    console.log(response);
                    swal("Algo sali?? mal","","error");
                }
            });

        } else {
          swal("No se borrado nada!");
        }
    });

    }
</script>
@endsection