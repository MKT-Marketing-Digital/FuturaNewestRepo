@extends('layoutPagina')
@section('contenido')
    
        <div classs="container">
            <div class="row m-0 margen-contenido height-slider">
                <div class="col-12 px-0">
                    <div id="carouselSliderInicio" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                        @foreach($sliders as $slider)
                            <div class="carousel-item active">
                                <img src="{{asset(Storage::url($slider->imagen))}}" class="d-block w-100 height-imagen" alt="">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{!!$slider->texto!!}</h5>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <style>
                
            </style>
            <div class="row m-0 RowQuienesSomosColorOscuro d-flex align-items-center justify-content-center">
                <div class="col-12 d-flex align-items-center justify-content-center py-3">
                    <h5>@lang('app.nav_quienes_somos')</h5>
                </div>
            </div>
            <div class="row m-0 RowQuienesSomosGris pt-4">
                <div class="col-md-4 col-12">
                    <div class="row">
                        <div class="col-12 py-2 d-flex align-items-center justify-content-center">
                            <img src="{{asset(storage::url($Mision->logo))}}">
                        </div>
                        <div class="col-12 py-2 d-flex align-items-center justify-content-center text-center">
                            <h2>{{$Mision->titulo}}</h2>
                        </div>
                        <div class="col-12 py-1 d-flex align-items-center justify-content-center text-center">
                            <p class="px-2 d-flex align-items-center justify-content-center">{!! $Mision->contenido !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="row">
                        <div class="col-12 py-2 d-flex align-items-center justify-content-center">
                            <img src="{{asset(storage::url($Vision->logo))}}">
                        </div>
                        <div class="col-12 py-2 d-flex align-items-center justify-content-center text-center">
                            <h2>{{$Vision->titulo}}</h2>
                        </div>
                        <div class="col-12 py-1 d-flex align-items-center justify-content-center text-center">
                            <p class="px-2 d-flex align-items-center justify-content-center">{!! $Vision->contenido !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="row">
                    <div class="col-12 py-2 d-flex align-items-center justify-content-center">
                            <img src="{{asset(storage::url($Valores->logo))}}">
                        </div>
                        <div class="col-12 py-2 d-flex align-items-center justify-content-center text-center">
                            <h2>{{$Valores->titulo}}</h2>
                        </div>
                        <div class="col-12 py-1 d-flex align-items-center justify-content-center text-center">
                            <p class="px-2 d-flex align-items-center justify-content-center">{!! $Valores->contenido !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-0 RowCalidadQuienesSomos mt-0 pt-0 text-center">
                <div class="col-12 mt-0 pt-0 d-flex align-items-center justify-content-center">
                    <img src="/imagenes/flechaGris.png">
                </div>
                <div class="col-12 pb-2 d-flex align-items-center justify-content-center">
                    <h2>{{$Calidad->titulo}}</h2>
                </div>
                <div class="col-12 py-2 d-flex align-items-center justify-content-center ">
                    <p class="d-flex align-items-center justify-content-center">{!! $Calidad->contenido !!}</p>
                </div>
            </div>
            <div class="row m-0 RowPoliticasAnexosQuienesSomos pt-3">
                <div class="col-md-6 col-12 ">
                    <div class="row">
                        <div class="col-12 pb-3 d-flex align-items-center justify-content-left">
                            <h2>{{$Politicas->titulo}}</h2>
                        </div>
                        <div class="col-12 pt-2 pb-0">
                            <p class="d-flex align-items-center justify-content-center">{!! $Politicas->contenido !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="row">
                        <div class="col-12 pb-3 d-flex align-items-center justify-content-left">
                            <h2>{{$TituloArchivos->titulo}}</h2>
                        </div>
                        @if(isset($Archivos))
                            @foreach($Archivos as $archivo)
                                <div class="col-12 py-2">
                                    <a class="d-flex align-items-center justify-content-left" href="/storage/{{$archivo->archivo}}" target="_blank">
                                        <img class="pt-0 pr-2 pb-4" src="/imagenes/pdf.png">
                                    	<span class="m-0">{{ $archivo->nombre }}</span>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="row m-0 RowHistoriaQuienesSomos pb-3 px-2 pt-0 padding-noResponsive">
                <div class="col-12 mt-0 pt-0 d-flex align-items-center justify-content-center">
                    <img src="/imagenes/flechaBlanca.png">
                </div>
                <div class="col-12 pb-2 d-flex align-items-center justify-content-center">
                    <h2>{{$Historia->titulo}}</h2>
                </div>
                <div class="col-12 py-2 d-flex align-items-center justify-content-center text-center">
                    <p>{!! $Historia->contenido !!}</p>
                </div>
                <div class="col-12 pb-2 d-flex align-items-center justify-content-center">
                    <button class="btn bottonLeerMasCollapse" data-toggle="collapse" data-target="#decadasCollapse">@lang('app.boton_leer_mas_quienes_somos')</button>
                </div>
                <div class="col-12 pt-4 pb-4">
                    <div style="background-color:white;" class="collapse" id="decadasCollapse">
                        @foreach($Decadas as $decada)
                            <div class="row px-md-5 px-4 text-center">
                                <div class="col-12 pt-4 d-flex align-items-center justify-content-center">
                                    <h5>{{$decada->titulo}}</h5>
                                </div>
                                <div class="col-12 pt-3 pb-2 d-flex align-items-center justify-content-center">
                                    <p class="d-flex align-items-center justify-content-center">{!! $decada->contenido !!}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <style>
            @media (min-width: 900px){
                .padding-noResponsive{
                padding-left: 10% !important;
                padding-right: 10% !important;
            }
}
        </style>
@endsection