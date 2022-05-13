const url= location.href;
$(function(){
    $('#formAgregarDescarga').on('submit',(e)=>{
        e.preventDefault();  
        const form = new FormData($('#formAgregarDescarga')[0]);
        $.ajax({
            type: "POST",
            url:url+"/agregarDescarga",
            data: form,
            processData:false,
            contentType:false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                swal("Descarga Agregada!","","success");
                setTimeout(function(){location.reload()},1500);
            },
            error: function(response){
                console.log(response);
                swal("Algo salio mal","","error");
            }
        });
    });
    $('#formEditarDescarga').on('submit',(e)=>{
        e.preventDefault();  
        let id=$('#id_descarga').val();
        const form = new FormData($('#formEditarDescarga')[0]);
        form.append('_method','PUT');
        $.ajax({
            type: "POST",
            url:url+"/actualizarDescarga/"+id,
            data: form,
            processData:false,
            contentType:false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                swal("Descarga Actualizada!","","success");
                setTimeout(function(){location.reload()},1500);
            },
            error: function(response){
                console.log(response);
                swal("Algo salio mal","","error");
            }
        });
    });
});
function editarDescarga(id){
    $.ajax({
        type: "GET",
        url:url+"/editarDescarga/"+id,
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
            $('#select_producto').val(response.prod_id);
        },
        error: function(response){
            console.log(response);
            swal("Algo salio mal","","error");
        }
    });
}