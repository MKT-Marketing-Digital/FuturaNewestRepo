<div class="container m-0 py-0  px-0 " style="background-color: #F1F0F0">
    @if(isset($marcas))
    <div class="row m-0 RowSliderFooter " style="overflow: hidden;">
        <div class="col-12">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                        @foreach($marcas as $marca)
                            <div class="swiper-slide"><img src="{{asset(Storage::url($marca->imagen))}}" tittle="{{$marca->nombre}}"></div>
                        @endforeach
                    </div>
                    <!-- Add Pagination 
                        <div class="swiper-pagination"></div>
                        Add Arrows -->
                    </div>
                </div>
                <div class="col-12 d-flex align-items-center justify-content-center py-2">
                    <a href="https://www.youtube.com/channel/UC0_xPjux7RUSA5H8UnIOkvw"><img src="/imagenes/logoyoutube.png"></a>
                    <a href="https://ar.linkedin.com/company/futura-hnos-"><img src="/imagenes/logolinkedin.png"></a>
                    <a href="https://www.facebook.com/Futura-102911031123203/"><img src="/imagenes/logofacebook.png"></a>
                    <a href="https://www.instagram.com/futura_hnos/"><img src="/imagenes/logoinstagram.png"></a>
                </div>
            </div>
            <style>
                @media (min-width: 900px){
                    .margin-noResponsive{
                        margin: 0 190px 0 190px !important;
                    }
                }
            </style>
    @endif
    <div class="row m-0 footerInformacionRow containerFooter pt-3">
        <div class="col-12 col-lg-4 ">
            <div class="row footerInfo">
                <div class="col-12 d-flex align-items-center justify-content-center pb-2">
                    <img src="/imagenes/logomaps.png">
                </div>
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <a href="https://www.google.com.ar/search?tbm=lcl&ei=ya7AW5K8OcOWwQT47JzwCg&q=Parque+Industrial+Gualeguaych%C3%BA+-+Entre+Rios&oq=Parque+Industrial+Gualeguaych%C3%BA+-+Entre+Rios&gs_l=psy-ab.3...9341.9341.0.9578.1.1.0.0.0.0.65.65.1.1.0....0...1c.1.64.psy-ab..0.0.0....0.CaIF_GUCr-0#rlfi=hd:;si:11218913312387952151;mv:!3m12!1m3!1d14287.427130736165!2d-58.5589502!3d-33.020937599999996!2m3!1f0!2f0!3f0!3m2!1i624!2i205!4f13.1" target="_blank"><span>@lang('app.footer_planta_caba')</span></a>
                </div>
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <a href="https://www.google.com.ar/search?tbm=lcl&ei=ya7AW5K8OcOWwQT47JzwCg&q=Parque+Industrial+Gualeguaych%C3%BA+-+Entre+Rios&oq=Parque+Industrial+Gualeguaych%C3%BA+-+Entre+Rios&gs_l=psy-ab.3...9341.9341.0.9578.1.1.0.0.0.0.65.65.1.1.0....0...1c.1.64.psy-ab..0.0.0....0.CaIF_GUCr-0#rlfi=hd:;si:11218913312387952151;mv:!3m12!1m3!1d14287.427130736165!2d-58.5589502!3d-33.020937599999996!2m3!1f0!2f0!3f0!3m2!1i624!2i205!4f13.1" target="_blank">Lacarra 1258 CABA (C1407JQ) Argentina</a>
                </div>
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <p>Tel. (+54 11) 4671 0300 | Fax (+54 11) 4674 043</p>
                </div>
            </div>
        </div>
        <div class="col-12 pb-3 pb-md-0 col-lg-4" >
            <div class="row footerInfo">
                <div class="col-12 d-flex align-items-center justify-content-center pb-2">
                    <img src="/imagenes/logomaps.png">
                </div>
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <a href="https://www.google.com.ar/search?tbm=lcl&ei=ya7AW5K8OcOWwQT47JzwCg&q=Parque+Industrial+Gualeguaych%C3%BA+-+Entre+Rios&oq=Parque+Industrial+Gualeguaych%C3%BA+-+Entre+Rios&gs_l=psy-ab.3...9341.9341.0.9578.1.1.0.0.0.0.65.65.1.1.0....0...1c.1.64.psy-ab..0.0.0....0.CaIF_GUCr-0#rlfi=hd:;si:11218913312387952151;mv:!3m12!1m3!1d14287.427130736165!2d-58.5589502!3d-33.020937599999996!2m3!1f0!2f0!3f0!3m2!1i624!2i205!4f13.1" target="_blank"><span>@lang('app.footer_planta_entre_rios')</span></a>
                </div>
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <a href="https://www.google.com.ar/search?tbm=lcl&ei=ya7AW5K8OcOWwQT47JzwCg&q=Parque+Industrial+Gualeguaych%C3%BA+-+Entre+Rios&oq=Parque+Industrial+Gualeguaych%C3%BA+-+Entre+Rios&gs_l=psy-ab.3...9341.9341.0.9578.1.1.0.0.0.0.65.65.1.1.0....0...1c.1.64.psy-ab..0.0.0....0.CaIF_GUCr-0#rlfi=hd:;si:11218913312387952151;mv:!3m12!1m3!1d14287.427130736165!2d-58.5589502!3d-33.020937599999996!2m3!1f0!2f0!3f0!3m2!1i624!2i205!4f13.1" target="_blank">Parque Industrial Gualeguaychú, Entre Ríos</a>
                </div>
            </div>
        </div>
        <div class="col-12 pb-3 pb-md-0 col-lg-4">
            <div class="row footerInfo">
                <div class="col-12 d-flex align-items-center justify-content-center pb-2">
                    <img src="/imagenes/logoemail.png">
                </div>
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <a href="https://www.google.com.ar/search?tbm=lcl&ei=ya7AW5K8OcOWwQT47JzwCg&q=Parque+Industrial+Gualeguaych%C3%BA+-+Entre+Rios&oq=Parque+Industrial+Gualeguaych%C3%BA+-+Entre+Rios&gs_l=psy-ab.3...9341.9341.0.9578.1.1.0.0.0.0.65.65.1.1.0....0...1c.1.64.psy-ab..0.0.0....0.CaIF_GUCr-0#rlfi=hd:;si:11218913312387952151;mv:!3m12!1m3!1d14287.427130736165!2d-58.5589502!3d-33.020937599999996!2m3!1f0!2f0!3f0!3m2!1i624!2i205!4f13.1" target="_blank"><span>@lang('app.nav_contacto')</span></a>
                </div>
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <a href="https://www.google.com.ar/search?tbm=lcl&ei=ya7AW5K8OcOWwQT47JzwCg&q=Parque+Industrial+Gualeguaych%C3%BA+-+Entre+Rios&oq=Parque+Industrial+Gualeguaych%C3%BA+-+Entre+Rios&gs_l=psy-ab.3...9341.9341.0.9578.1.1.0.0.0.0.65.65.1.1.0....0...1c.1.64.psy-ab..0.0.0....0.CaIF_GUCr-0#rlfi=hd:;si:11218913312387952151;mv:!3m12!1m3!1d14287.427130736165!2d-58.5589502!3d-33.020937599999996!2m3!1f0!2f0!3f0!3m2!1i624!2i205!4f13.1" target="_blank">info@futura.com.ar</a>
                </div>
            </div>
        </div>
        <div class="col-12 columnaDivisoria">
        	<div class="row justify-content-center text-center">
            	<div class="justify-content-center">
            		<a class="nav-link d-flex d-md-block justify-content-center" href="/">@lang('app.nav_inicio')</a>
            	</div>
            	<div class=" justify-content-center">
            		<a class="nav-link d-flex d-md-block justify-content-center" href="/quienes-somos">@lang('app.nav_quienes_somos')</a>
            	</div>
            	<div class=" justify-content-center">
            		<a class="nav-link d-flex d-md-block justify-content-center" href="/productos">@lang('app.nav_productos')</a>
            	</div>
            	<div class=" justify-content-center">
            		<a class="nav-link d-flex d-md-block justify-content-center" href="/distribuidores">@lang('app.nav_distribuidores')</a>
            	</div>
            	<div class=" justify-content-center">
            		<a class="nav-link d-flex d-md-block justify-content-center" href="/servicios">@lang('app.nav_servicios')</a>
            	</div>
           	 	<div class=" justify-content-center">
            		<a class="nav-link d-flex d-md-block justify-content-center" href="/documentos">@lang('app.nav_documentos')</a>
            	</div>
            	<div class="justify-content-center">
            		<a class="nav-link d-flex d-md-block justify-content-center" href="/contacto">@lang('app.nav_contacto')</a>
            	</div>
        	</div>
        </div>
    
    </div>
	<div class="row m-0 p-0">
    	<div class="col-12">
    		<div class="whatsapp">
 				<a href="https://api.whatsapp.com/send?phone=5491141575830" target="_blank" title="Contactame por Whatsapp">
 				<img src="{{asset('imagenes/wpp.png')}}" alt="WhatsApp" />
 				</a>
			</div>
    	</div>
    <div class="col-8 footer-mkt text-center d-flex align-items-center justify-content-center mt-1" style="margin: 0 auto;">
            <a href="https://mktmarketingdigital.com" class="mr-1">Marketing Digital </a>

            <a href="https://mktmarketingdigital.com/servicios/">Made with <img draggable="false" role="img" class="emoji" alt="❤" src="https://s.w.org/images/core/emoji/13.0.0/svg/2764.svg"> 
            MKT Marketing Digital</a>
        </div>
        <style>
            .footer-mkt img{
                height: 15px;
            }
            .footer-mkt a{
                color: black;
            }
            .footer-mkt{
                color: black;
            }
        </style>
	</div>
</div>
<script>
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 1,
      spaceBetween: 30,
      slidesPerGroup: 1,
      loop: true,
      loopFillGroupWithBlank: true,
      breakpoints:{
          700:{
            slidesPerView: 3,
            slidesPerGroup: 3,
          },
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      autoplay: {
        delay: 1,
        disableOnInteraction: false,
      },
      speed: 3000,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
</script>