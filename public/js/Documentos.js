const url= location.href;
$(function(){
    $('#formAgregarDocumento').on('submit',(e)=>{
        e.preventDefault();  
        const form = new FormData($('#formAgregarDocumento')[0]);
        $.ajax({
            type: "POST",
            url:url+"/agregarDocumento",
            data: form,
            processData:false,
            contentType:false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                swal("Documento Agregado!","","success");
                setTimeout(function(){location.reload()},1500);
            },
            error: function(response){
                console.log(response);
                swal("Algo salio mal","","error");
            }
        });
    });
    $('#formEditarDocumento').on('submit',(e)=>{
        e.preventDefault();  
        let id=$('#id_descarga').val();
        const form = new FormData($('#formEditarDocumento')[0]);
        form.append('_method','PUT');
        $.ajax({
            type: "POST",
            url:url+"/actualizarDocumento/"+id,
            data: form,
            processData:false,
            contentType:false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                swal("Documento Actualizado!","","success");
                setTimeout(function(){location.reload()},1500);
            },
            error: function(response){
                console.log(response);
                swal("Algo salio mal","","error");
            }
        });
    });
    $('input[name=cat-sub]').on('change',(e)=>{
        if(e.target.value==1){
            $('#Categorias').removeClass('d-none');
            $('#select_cats').prop('required',true);
            $('#SubCategorias').addClass('d-none');
            $('#select_subcats').prop('required',false);
        }else{
            $('#Categorias').addClass('d-none');
            $('#select_cats').prop('required',false);
            $('#SubCategorias').removeClass('d-none');
            $('#select_subcats').prop('required',true);
        }
     });
});
function editarDocumento(id){
    $.ajax({
        type: "GET",
        url:url+"/editarDocumento/"+id,
        processData:false,
        contentType:false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            $('#id_descarga').val(id);
            $('#orden_descarga').val(response.orden);
            $('#nombre').val(response.nombre);
            $('#titulo_en').val(response.titulo_en);
            $('#titulo_pt').val(response.titulo_pt);
            if(response.category_id!=null){
                $('#exampleRadios1').prop('checked',true);
                $('#select_cats_edit').val(response.category_id);
                $('#CategoriasEdit').removeClass('d-none');
            }else{
                $('#exampleRadios2').prop('checked',true);
                $('#select_subcats_edit').val(response.subcategory_id);
                $('#SubCategoriasEdit').removeClass('d-none');
            }
            
           
        },
        error: function(response){
            console.log(response);
            swal("Algo salio mal","","error");
        }
    });
}
function eliminarDocumento(id){
    swal({
        title: "Esta seguro/a de eliminar este Documento?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            const url= location.pathname;
            $.ajax({
                type: "DELETE",
                url: url+"/eliminarDocumento/"+id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    swal("Poof! Documento Eliminado!","","success");
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