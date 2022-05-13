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
            <div class="row m-0 RowDistribuidoresColorOscuro d-flex align-items-center justify-content-center">
                <div class="col-12 d-flex align-items-center justify-content-center py-3">
                    <h5>@lang('app.nav_distribuidores')</h5>
                </div>
            </div>
            <div class="row m-0 RowDistribuidores pt-3" id="mapa-red-top">
                <div class="col-12 pt-lg-2 col-lg-6 pl-lg-5 pr-lg-0 d-flex justify-content-center">
                    <img src="imagenes/mapa.jpg" usemap="#mapa-red" class="imagen-mapa" style="min-width:320px;">
                    <map name="#mapa-red" id="#mapa-red">
                        <area shape="poly" coords="28,82,39,67,35,47,48,30,54,21,75,14,65,24,62,34,69,39,70,49,82,47,89,53,99,53,97,64,101,70,101,78,85,82,84,94,88,99,84,118,80,115,83,109,66,107,53,94" class="colombia">
                        <area shape="poly" coords="27,84,15,99,16,107,22,110,19,119,26,123,32,112,50,97,45,90" class="ecuador">
                        <area shape="poly" coords="15,115,14,130,45,179,82,220,89,197,88,193,91,172,87,163,79,162,78,154,70,157,59,141,65,124,81,118,80,114,83,109,64,109,53,94,49,94,50,98,45,106,32,112,26,124,22,121,17,119" class="peru">
                        <area shape="poly" coords="89,164,90,197,86,204,90,209,93,216,91,225,99,239,109,233,120,237,131,233,133,222,140,217,153,215,160,219,161,205,147,197,143,181,119,172,112,155,90,165" class="bolivia">
                        <area shape="poly" coords="121,281,130,299,151,300,150,279" class="santafe">
                        <area shape="poly" coords="137,324,136,343,159,344,155,321" class="buenosaires">
                        <area shape="poly" coords="78,342,76,361,95,361,95,345" class="neuquen">
                    </map>
                    
                    <div id="colombia">
                        <img src="imagenes/colombia.jpg"><br>
                        Carrera 16 # 96 - 64<br>
                        Tel.: (57-1) 711 3648<br>
                        info@flow-energy.com<br>
                        <a href="http://flow-energy.com/" style="text-decoration:none; color:inherit;">www.flow-energy.com</a>
                    </div>
                    
                    <div id="ecuador">
                        <img src="imagenes/ecuador.jpg"><br>
                        Sangolquí, Bobonaza OE11-196 y Río Mira<br>
                        Tel.: 0995574595<br>
                        info@ulmaoil.com<br>
                        <a href="https://www.ulmaoil.com/" style="text-decoration:none; color:inherit;">www.ulmaoil.com</a>
                    </div>
                    
                    <div id="peru">
                        <img src="imagenes/peru.jpg"><br>
                        Av. Intihuatana 857.<br>
                        Santiago de Surco. Lima – Perú<br>
                        Tel.: (511) 271-2868<br>
                        ventas@tramecope.com<br>
                        <a href="https://www.tramecosac.com/" style="text-decoration:none; color:inherit;">www.tramecosac.com</a>
                    </div>
                    
                    <div id="bolivia">
                        <img src="imagenes/bolivia.jpg"><br>
                        Colinas del Urubo Av. Sexta # 163<br>
                        Tel.: (+591) (3) 3244394<br>
                        ventas@speed.com.bo<br>
                        <a href="http://www.speed.com.bo/quienes-somos/" style="text-decoration:none; color:inherit;">www.speed.com.bo</a>
                    </div>
                    
                    <div id="santafe">
                        <img src="imagenes/santafe.jpg"><br>
                        AV. SAN MARTÍN 3148<br>
                        SAN LORENZO<br>
                        Tel.: +54 03476 426900<br>
                        cem@cemprovin.com.ar<br>
                        <a href="https://www.cemprovin.com.ar/" style="text-decoration:none; color:inherit;">www.cemprovin.com.ar</a>
                    </div> 
                    
                    <div id="buenosaires">
                        <img src="imagenes/buenosaires.jpg"><br>
                        Alicia Moreau de Justo 3534 (1752)<br>
                        Lomas del Mirador Buenos Aires, Argentina.<br>
                        Tel.: (+5411) 4441 0247<br>
                        info@grupoprovemet.com<br>
                        <a href="https://www.grupoprovemet.com.ar/" style="text-decoration:none; color:inherit;">www.grupoprovemet.com.ar</a>
                    </div>
                    
                    <div id="neuquen">
                        <img src="imagenes/buenosaires.jpg"><br>
                        Gdor. Emilio Belenguer 3467<br>
                        Parque Industrial PIN Este. Neuquén.<br>
                        Tel.: (+54299) 441 3195<br>
                        info@grupoprovemet.com<br>
                        <a href="https://www.grupoprovemet.com.ar/" style="text-decoration:none; color:inherit;">www.grupoprovemet.com.ar</a>
                    </div> 
                </div>
                <div class="col-12 pt-lg-3 col-lg-6 d-flex align-items-left d-flex justify-content-md-center justify-content-left">
                    <a href="#mapa-red-top"><div id="distri-items">
                        <h1 class="item-colombia d-flex align-items-center"><img src="imagenes/icodistri.jpg" style=" margin-right:8px;">COLOMBIA<br>
                        </h1>
                        <h1 class="item-ecuador d-flex align-items-center"><img src="imagenes/icodistri.jpg" style=" margin-right:8px;">ECUADOR<br>
                        </h1>
                        <h1 class="item-peru d-flex align-items-center"><img src="imagenes/icodistri.jpg" style=" margin-right:8px;">PERÚ<br>
                        </h1>
                        <h1 class="item-bolivia d-flex align-items-center"><img src="imagenes/icodistri.jpg" style="  margin-right:8px;">BOLIVIA<br>
                        </h1>
                        <h1 class="item-santafe d-flex align-items-center"><img src="imagenes/icodistri.jpg" style=" margin-right:8px;">ARGENTINA<span style="margin-left:10px; flex:none;">| Santa fé</span>
                        </h1>
                        <h1 class="item-bsas d-flex align-items-center"><img src="imagenes/icodistri.jpg" style=" margin-right:8px;">ARGENTINA<span style="margin-left:10px; flex:none;">| Buenos Aires</span>
                        </h1>
                        <h1 class="item-neuquen d-flex align-items-center"><img src="imagenes/icodistri.jpg" style=" margin-right:8px;">ARGENTINA<span style="margin-left:10px; flex:none;"> | Neuquén</span>
                        </h1>
                    </a>
                </div>
            </div>
        </div>

        {{-- scripts --}}
    <script src='//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js' type='text/javascript'></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.colombia,.item-colombia').click(function(evento) {
                $('#colombia').fadeIn(1000);
                $('#ecuador, #peru, #bolivia, #santafe, #buenosaires, #neuquen').fadeOut(100);
           });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {	
            $('.ecuador,.item-ecuador').click(function(evento) {
                $('#ecuador').fadeIn(1000);
                $('#colombia, #peru, #bolivia, #santafe, #buenosaires, #neuquen').fadeOut(100);
             });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {	
            $('.peru,.item-peru').click(function(evento) {
                $('#peru').fadeIn(1000);
                $('#colombia, #ecuador, #bolivia, #santafe, #buenosaires, #neuquen').fadeOut(100);
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {	
			$('.bolivia,.item-bolivia').click(function(evento) {
                $('#bolivia').fadeIn(1000);
                $('#colombia, #ecuador, #peru, #santafe, #buenosaires, #neuquen').fadeOut(100);
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {	
			$('.santafe,.item-santafe').click(function(evento) {
                $('#santafe').fadeIn(1000);
                $('#colombia, #ecuador, #peru, #bolivia, #buenosaires, #neuquen').fadeOut(100);
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {	
			$('.buenosaires,.item-bsas').click(function(evento) {
                $('#buenosaires').fadeIn(1000);
                $('#colombia, #ecuador, #peru, #bolivia, #santafe, #neuquen').fadeOut(100);
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
			$('.neuquen,.item-neuquen').click(function(evento) {
                $('#neuquen').fadeIn(1000);
                $('#colombia, #ecuador, #peru, #bolivia, #santafe, #buenosaires').fadeOut(100);
            });
        });
    </script>	
@endsection