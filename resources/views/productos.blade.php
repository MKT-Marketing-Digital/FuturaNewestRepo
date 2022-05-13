@extends('layoutPagina')
@section('contenido')
        <div classs="container m-0">
            <div class="row m-0 margen-contenido height-slider">
                <div class="col-12  px-0">
                    <div id="carouselSliderInicio" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($sliders as $slider)
                                @if ($loop->first)
                                <div class="carousel-item active">
                                    <img src="{{asset(Storage::url($slider->imagen))}}" class="d-block w-100 height-slider" alt="">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>{!!$slider->texto!!}</h5>
                                    </div>
                                </div>
                                @else
                                <div class="carousel-item">
                                    <img src="{{asset(Storage::url($slider->imagen))}}" class="d-block w-100 height-slider" alt="">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>{!!$slider->texto!!}</h5>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div> 
                </div>
            </div> 
            <style>
                
            </style>
            <div class="row m-0 RowProductosColorOscuro">
                <div class="col-12 d-flex align-items-center justify-content-center py-3">
                    <h5>@lang('app.titulo_productos')</h5>
                </div>
            </div>
        </div>
        <div class="container p-0 m-0" style="background-color: #f1f0f0 !important;">
            {{--<div>--}}
                <div class="row m-0 RowCategoriasProductos margen-contenido" id="productos" style="background: -moz-repeating-linear-gradient(45deg, #005588, #00aacc 30px, #eee 30px;
                        background: -webkit-repeating-linear-gradient(45deg, #005588, #00aacc 30px);">
                    <div class="col-12 px-md-5 m-0">
                        @foreach($categorias as $categoria)
                        
                            <div id="" class="box categoria_{{$categoria->id}} pr-1 pb-1 pt-1">
                                <a data-toggle="collapse" href="#categoria_{{$categoria->id}}" onclick="cerrarOtrosCollapse({{$categoria->id}})" aria-expanded="false" >
                                    <span class="wrapper">
                                        <h1 style="height: 70px; max-height: 70px">{!! $categoria->titulo !!}</h1>
                                    </span>
                                    <img src="{{asset(Storage::url($categoria->imagen))}}" class="img-fluid imagenCategoriaProducto">
                                </a>
                            </div>
                        
                        @endforeach
                    </div>
                </div>
           {{-- </div>--}}
            <div class="row m-0 px-md-5 px-2 RowCategoriasDesplegableProductos pt-4 pb-5">
                @foreach($categorias as $categoria)
                <div class="col-12 px-md-5 pt-2 pb-5 columaDesplegableCategoria collapse " id="categoria_{{$categoria->id}}">
                    @if($categoria->producto()->get()->first() != null)
                        {!! $categoria->producto()->get()->first()->texto !!}
                        @php
                            $producto = $categoria->producto()->get()->first();
                        @endphp
                        @if($producto->enlace != null)
                            <a href="{{$producto->enlace}}" class="btn bottonEnlaceProducto">@lang('app.enlaceProducto')</a>
                        @endif

                        @if(($descargas = $producto->descargas()->get()) != null)
                			@if(count($descargas) >0)
                            	<h5 class="pb-3 pt-5 descargaArchivosProductos">DESCARGA DE ARCHIVOS</h5>
               				@endif
                            @php $cont = 0; @endphp
                            @foreach($descargas as $descarga)
                                @if($cont == 3) 
                                    <h5 class="pb-3 pt-5 descargaArchivosProductos">CERTIFICACI&Oacute;N DE DATOS</h5>
                                @endif
                                <a class="d-flex mt-4 align-items-center pl-2" href="{{asset(Storage::url($descarga->archivo))}}" target="_blank">
                                    <img src="/imagenes/pdf.png" class="img-fluid pr-2">
                                    {{$descarga->nombre}}
                                </a>
                                @php $cont++; @endphp
                            @endforeach
                        @endif
                    @endif
                    
                </div>
                @endforeach
            </div> 
        </div> 
<script type="text/javascript">
    var categorias = <?php echo $categorias ?> ;
    function cerrarOtrosCollapse(id){
        for(var j= 0; j < categorias.length; j++){
            if(id != categorias[j].id){
                $('#categoria_'+categorias[j].id).collapse("hide");
            }
        }
   		if(screen.width <= 510){
        	window.scroll({
  				top: 1050,
  				behavior: 'smooth'
			});
        }
    	else if(screen.width > 510 && screen.width <=625){
        	window.scroll({
  				top: 1280,
  				behavior: 'smooth'
			});
        }
    	else if(screen.width >625 && screen.width <=768){
        	window.scroll({
  				top: 1620,
  				behavior: 'smooth'
			});
        }
    	else if(screen.width >768 && screen.width <=1080){
        	window.scroll({
  				top: 420,
  				behavior: 'smooth'
			});
        }
    	else if(screen.width > 1080){
        	window.scroll({
  				top: 400,
  				behavior: 'smooth'
			});
        }
    }
</script>
@endsection