@extends('layoutPagina')
@section('contenido') 
        <div classs="container">
            <div class="row m-0 margen-contenido height-slider">
           	 	<div class="m-0 p-0 d-none">
                	<span id="idiomaImagenSlider">@lang('app.imagen_slider')</span>
            	</div>
                <div class="col-12 px-0">
                    <div id="carouselSliderInicio" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                        @foreach($sliders as $slider)
                            <div class="carousel-item active">
	                                <img src="{{asset(Storage::url($slider->imagen))}}" class=" w-100 height-imagen" alt="" id="imagen_español">
                            		<img src="{{asset(Storage::url($slider->imagen_ingles))}}" class=" w-100 height-imagen" alt="" id="imagen_ingles">
                            		<img src="{{asset(Storage::url($slider->imagen_portugues))}}" class=" w-100 height-imagen" alt="" id="imagen_portugues">
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
            <div class="row m-0 RowChecksServicios pb-5">
                @foreach($checks as $check)
                    <div class="col-md-6 col-12">
                        <div class="row pt-5">
                            <div class="col-12 d-flex align-items-center justify-content-center pt-3 pb-3">
                                <img class="img-fluid" src="/imagenes/okmantenimiento.png">
                            </div>
                            <div class="col-12 d-flex align-items-center justify-content-center">
                                <p>{{$check->contenido}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row m-0 d-none d-md-block">
                <div class="col-12 px-0">
                    <img src="{{asset(Storage::url($antes_despues->imagen))}}" class="img-fluid">
                </div>
            </div>
            <div class="row m-0 RowOscuraSeIncluyeServicios">
                <div class="col-12">
                    <div class="row pb-3">
                        <div class="col-12 py-4 d-flex align-items-center justify-content-center">
                            <img src="{{asset(Storage::url($se_incluye->imagen))}}" class="img-fluid">
                        </div>
                        <div class="col-12 pb-2 d-flex align-items-center justify-content-center">
                            <h3>{{$se_incluye->titulo}}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row pb-2 pt-2">
                        @foreach($mantenimientos as $mantenimiento)
                            <div class="col-12 col-lg-4">
                                <div class="row">
                                    <div class="col-12 pt-2 d-flex align-items-center justify-content-center">
                                        <h5>{{$mantenimiento->titulo}}</h5>
                                    </div>
                                    <div class="col-12 py-3 d-flex align-items-center justify-content-center">
                                        <hr>
                                    </div>
                                    <div class="col-12 pb-4 d-flex align-items-center justify-content-center">
                                        <p>{{$mantenimiento->contenido}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row m-0 RowCardsServicios justify-content-center align-items-center">
                @foreach($cards as $card)
                    <div class="col-12 col-md-4 mb-4 mb-md-0 servicios-contenedor" style="margin: 0 auto;">
                        <div class="row ColColorBlanco mr-md-2 mr-0">
                            <div class="col-12 pt-2 d-flex align-items-center justify-content-center h-imagen" style="height: 80px">
                                <img class="img-fluid" src="{{asset(Storage::url($card->imagen))}}">
                            </div>
                            <div class="col-12 py-3 d-flex align-items-center justify-content-center h-titulo" style="height: 70px">
                                <h4>{{$card->titulo}}</h4>
                            </div>
                            <div class="col-12 pb-2 d-flex align-items-center justify-content-center h-contenido" style="height: 200px">
                                <p>{{$card->contenido}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <style>
                .h-imagen{
                    height: 80px;
                }
                .h-titulo{
                    height: 70px;
                }
                .h-contenido{
                    height: 200px;
                }
                .servicios-contenedor{
                    height: 350px;
                    max-height: 350px;
                }
                @media(max-width: 800px){
                    .servicios-contenedor{
                    height: 550px;
                    max-height: 550px;
                    }
                    .h-imagen{
                    height: 40px;
                    }
                    .h-titulo{
                        height: 35px;
                    }
                    .h-contenido{
                        height: 200px;
                    }
                }
            </style>
        </div>
	<script>
    	if($('#idiomaImagenSlider').html() == 'español'){
        	$('#imagen_ingles').addClass('d-none');
        	$('#imagen_portugues').addClass('d-none');
        	if($('#imagen_español').hasClass('d-none')){
        		$('#imagen_español').removeClass('d-none');
            }
        }
    	else if($('#idiomaImagenSlider').html() == 'ingles'){
        	$('#imagen_español').addClass('d-none');
        	$('#imagen_portugues').addClass('d-none');
        	if($('#imagen_ingles').hasClass('d-none')){
        		$('#imagen_ingles').removeClass('d-none');
            }
        }
    	else if($('#idiomaImagenSlider').html() == 'portugues'){
        	$('#imagen_ingles').addClass('d-none');
        	$('#imagen_español').addClass('d-none');
        	if($('#imagen_portugues').hasClass('d-none')){
        		$('#imagen_portugues').removeClass('d-none');
            }
        }
	</script>
@endsection