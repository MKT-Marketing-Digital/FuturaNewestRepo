@extends('layoutVistaGracias')
@section('contenido')
    <div class="container m-0 p-0">
        <div class="row RowEncabezadoGracias m-0">
            <div class="col-12 m-0">
                <img class="img-fluid" src="{{asset(Storage::url($logoIconoFutura->icono))}}">
            </div>
        </div>
        <div class="row RowMensajeGracias m-0 py-5">
            <div class="col-12 py-3 px-5 d-flex align-items-center justify-content-center">
                <h2>@lang('app.mensaje_de_gracias')</h2>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function(){ location.href = "/"; }, 4000);
    </script>
@endsection