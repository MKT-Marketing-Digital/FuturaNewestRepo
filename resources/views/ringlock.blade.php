@extends('layoutPagina')
@section('contenido')
<div class="container p-0 m-0">
    <div class="row m-0">
    	<div class="m-0 p-0 d-none">
            <span id="idiomaImagenSlider">@lang('app.imagen_slider')</span>
        </div>
        <div class="col-12 px-0">
            <div id="carouselSliderRinglock" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/imagenes/ringlock.jpg" class=" w-100" alt="" id="imagen_español">
                    	<img src="/imagenes/ringlock_ingles.jpg" class=" w-100" alt="" id="imagen_ingles">
                    	<img src="/imagenes/ringlock_portugues.jpg" class=" w-100" alt="" id="imagen_portugues">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row RowColorGrisCaracteristicasrRingLock m-0 pb-4">
        <div class="col-12 py-3 d-flex align-items-center justify-content-center">
            <img src="/imagenes/ico-ring.png">
        </div>
        <div class="col-12 pt-lg-2 mb-lg-3 pb-lg-4 d-flex align-items-center justify-content-center">
            <h2>@lang('app.ringlock_subtitulo_caract')</h2>
        </div>
        <div class="col-12 col-lg-6 pl-lg-5 mb-lg-2 mt-lg-4">
            <div class="row">
                <div class="col-12 py-2 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring2.png">
                    <p>@lang('app.ringloc_check_1')</p>
                </div>
                <div class="col-12 py-2 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring2.png">
                    <p>@lang('app.ringloc_check_2')</p>
                </div>
                <div class="col-12 py-2 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring2.png">
                    <p>@lang('app.ringloc_check_3')</p>
                </div>
                <div class="col-12 py-2 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring2.png">
                    <p>@lang('app.ringloc_check_4')</p>
                </div>
                <div class="col-12 py-2 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring2.png">
                    <p>@lang('app.ringloc_check_5')</p>
                </div>
                <div class="col-12 py-2 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring2.png">
                    <p>@lang('app.ringloc_check_6')</p>
                </div>
                <div class="col-12 py-2 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring2.png">
                    <p>@lang('app.ringloc_check_7')</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 pl-lg-5 mb-lg-2 mt-lg-4">
            <div class="row">
                <div class="col-12 py-2 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring2.png">
                    <p>@lang('app.ringloc_check_8')</p>
                </div>
                <div class="col-12 py-2 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring2.png">
                    <p>@lang('app.ringloc_check_9')</p>
                </div>
                <div class="col-12 py-2 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring2.png">
                    <p>@lang('app.ringloc_check_10')</p>
                </div>
                <div class="col-12 py-2 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring2.png">
                    <p>@lang('app.ringloc_check_11')</p>
                </div>
                <div class="col-12 py-2 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring2.png">
                    <p>@lang('app.ringloc_check_12')</p>
                </div>
                <div class="col-12 py-2 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring2.png">
                    <p>@lang('app.ringloc_check_13')</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row RowImagenLateralNarajna m-0">
        <div class="col-12 p-0 m-0">
            <img src="/imagenes/lineadiagonal.jpg">
        </div>
    </div>
    <div class="row RowColorNaranjaRingLock m-0 pb-5">
        <div class="col-12 pt-lg-2 mb-lg-3 pb-lg-4 d-flex align-items-center justify-content-center">
            <h2>@lang('app.ringlock_subtitulo_porque')</h2>
        </div>
        <div class="col-12 col-lg-6 pl-lg-5 mb-lg-2 mt-lg-4">
            <div class="row">
                <div class="col-12 py-2 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring-blanco.png">
                    <p>@lang('app.ringlock_porque_1')</p>
                </div>
                <div class="col-12 py-2 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring-blanco.png">
                    <p>@lang('app.ringlock_porque_2')</p>
                </div>
                <div class="col-12 py-2 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring-blanco.png">
                    <p>@lang('app.ringlock_porque_3')</p>
                </div>
                <div class="col-12 py-2 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring-blanco.png">
                    <p>@lang('app.ringlock_porque_4')</p>
                </div>
                <div class="col-12 py-2 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring-blanco.png">
                    <p>@lang('app.ringlock_porque_5')</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 pl-lg-5 mb-lg-2 mt-lg-4">
            <div class="row">
                <div class="col-12 py-2 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring-blanco.png">
                    <p>@lang('app.ringlock_porque_6')</p>
                </div>
                <div class="col-12 py-3 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring-blanco.png">
                    <p>@lang('app.ringlock_porque_7')</p>
                </div>
                <div class="col-12 py-3 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring-blanco.png">
                    <p>@lang('app.ringlock_porque_8')</p>
                </div>
                <div class="col-12 py-3 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring-blanco.png">
                    <p>@lang('app.ringlock_porque_9')</p>
                </div>
                <div class="col-12 py-1 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring-blanco.png">
                    <p>@lang('app.ringlock_porque_10')</p>
                </div>
            </div>
        </div>

        <div class="col-12 my-3 d-flex align-items-center justify-content-center">
            <button class="go-to-contacto p-3 bg-dark" style="border-radius: 5px; border: none; font-family: 'Montserrat-Medium', sans-serif; color: white;">
                @lang('app.contacto')
            </button>
        </div>
    </div>
    
    <div class="row RowManualyVideo pt-3 m-0">
        <div class="col-12 col-lg-6">
            <a target="_blank" href="https://www.youtube.com/watch?v=r5Wq4w0P3YE&ab_channel=FuturaHermanosS.R.L">
                <img class="img-fluid" src="/imagenes/video.jpg">
            </a>
        </div>
        <div class="col-12 col-lg-6">
            <a target="_blank" href="/archivos/manual-ringlock.pdf">
                <img class="img-fluid" src="/imagenes/manual.jpg">
            </a>
        </div>
    </div>
    <div class="row m-0">
        <div class="col-12 p-0 d-flex justify-content-center">
            <img class="img-fluid" src="/imagenes/fotitos.jpg">
        </div>
        <div class="col-12 p-0">
            <img class="img-fluid" src="/imagenes/lineadiagonal2.jpg">
        </div>
    </div>
    <div class="row RowColorOscuraRingLock m-0">
        <div class="col-12 py-3 d-flex align-items-center justify-content-center">
            <img src="/imagenes/ico-ring.png">
        </div>
        <div class="col-12 pt-lg-2 mb-lg-2 pb-lg-2 d-flex align-items-center justify-content-center">
            <h2>@lang('app.ringlock_subtitulo_elegi')</h2>
        </div>
        <div class="col-12 col-lg-6 pl-lg-5 mb-lg-5 mt-lg-3">
            <div class="row">
                <div class="col-12 py-2 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring3.png">
                    <p>@lang('app.ringlock_elegi_1')</p>
                </div>
                <div class="col-12 py-2 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring3.png">
                    <p>@lang('app.ringlock_elegi_2')</p>
                </div>
                <div class="col-12 py-2 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring3.png">
                    <p>@lang('app.ringlock_elegi_3')</p>
                </div>
                <div class="col-12 py-2 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring3.png">
                    <p>@lang('app.ringlock_elegi_4')</p>
                </div>
                <div class="col-12 py-2 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring3.png">
                    <p>@lang('app.ringlock_elegi_5')</p>
                </div>
                <div class="col-12 py-2 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring3.png">
                    <p>@lang('app.ringlock_elegi_6')</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 pl-lg-5 mb-lg-2 mt-lg-4">
            <div class="row">
                <div class="col-12 py-2 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring3.png">
                    <p>@lang('app.ringlock_elegi_7')</p>
                </div>
                <div class="col-12 py-2 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring3.png">
                    <p>@lang('app.ringlock_elegi_8')</p>
                </div>
                <div class="col-12 py-2 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring3.png">
                    <p>@lang('app.ringlock_elegi_9')</p>
                </div>
                <div class="col-12 py-3 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring3.png">
                    <p>@lang('app.ringlock_elegi_10')</p>
                </div>
                <div class="col-12 py-1 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring3.png">
                    <p>@lang('app.ringlock_elegi_11')</p>
                </div>
                <div class="col-12 py-1 my-2 d-flex align-items-center pl-3">
                    <img src="/imagenes/item-ring3.png">
                    <p>@lang('app.ringlock_elegi_12')</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row RowCalidadRingLock pb-4 m-0">
        <div class="col-12 pt-4 pb-3 d-flex align-items-center justify-content-center">
            <h2>@lang('app.ringlock_subtitulo_calidad')</h2>
        </div>
        <div class="col-12 pt-3 pb-2 d-flex align-items-center justify-content-center">
            <p>@lang('app.ringlock_parrafo_calidad')</p>
        </div>
        <div class="col-12 d-flex align-items-center justify-content-center">
            <img class="img-fluid" src="/imagenes/graficos.jpg">
        </div>
    </div>
    <div class="col-12 my-3 d-flex align-items-center justify-content-center">
        <button class="go-to-contacto p-3 bg-dark" style="border-radius: 5px; border: none; font-family: 'Montserrat-Medium', sans-serif; color: white;">
            @lang('app.contacto')
        </button>
    </div>
    <div class="row m-0 RowGrisInstaladas pb-4">
        <div class="col-12 d-flex align-items-center justify-content-center pt-5 pb-3">
            <h2>@lang('app.ringlock_subtitulo_instaladas')</h2>
        </div>
        <div class="col-12 d-flex align-items-center justify-content-center pt-1">
            <img class="img-fluid" src="/imagenes/mapa-tapas.png">
        </div>
    </div>
    <div class="row m-0 RowClientesRingLock pb-4">
        <div class="col-12 d-flex align-items-center justify-content-center pt-5 pb-3">
            <h2>@lang('app.ringlock_subtitulo_clientes')</h2>
        </div>
        <div class="col-12 d-flex pl-5 align-items-center justify-content-center pt-1">
            <img class="img-fluid" src="/imagenes/tapa1.jpg">
            <img class="img-fluid" src="/imagenes/tapa2.jpg">
            <img class="img-fluid" src="/imagenes/tapa3.jpg">
            <img class="img-fluid" src="/imagenes/tapa4.jpg">
            <img class="img-fluid" src="/imagenes/tapa5.jpg">
        </div>
        <div class="col-12 pl-5 d-flex align-items-center justify-content-center">
            <img class="img-fluid" src="/imagenes/tapa6.jpg">
            <img class="img-fluid" src="/imagenes/tapa7.jpg">
            <img class="img-fluid" src="/imagenes/tapa8.jpg">
            <img class="img-fluid" src="/imagenes/tapa9.jpg">
            <img class="img-fluid" src="/imagenes/tapa10.jpg">
        </div>
        <div class="col-12 pl-5 d-flex align-items-center justify-content-center">
            <img class="img-fluid" src="/imagenes/tapa11.jpg">
            <img class="img-fluid" src="/imagenes/tapa12.jpg">
            <img class="img-fluid" src="/imagenes/tapa13.jpg">
            <img class="img-fluid" src="/imagenes/tapa14.jpg">
            <img class="img-fluid" src="/imagenes/tapa15.jpg">
        </div>
        <div class="col-12 pl-5 d-flex align-items-center justify-content-center">
            <img class="img-fluid" src="/imagenes/tapa16.jpg">
            <img class="img-fluid" src="/imagenes/tapa17.jpg">
            <img class="img-fluid" src="/imagenes/tapa18.jpg">
            <img class="img-fluid" src="/imagenes/tapa19.jpg">
            <img class="img-fluid" src="/imagenes/tapa20.jpg">
        </div>
    </div>
</div>
<div class="row m-0 pb-3 pt-4 RowFormularioDeContacto d-flex align-items-center justify-content-center">
    <form method="POST" class="form-group" action="{{route('EnviarConsulta')}}" id="formularioContacto" name="formularioContacto">
        @csrf
        <div class="col-12">
            @if (session()->has('success'))
                <div class="alert alert-success">
                @lang('app.mensajeFormulario')
                </div>
            @endif
            @if (session()->has('error'))
            <div class="alert alert-danger">
                {{session()->get('error')}}
            </div>
            @endif
        </div>
        <div class="col-12 d-flex align-items-center justify-content-center pt-5">
            <h5>@lang('app.contacto_form_subtitulo')</h5>
        </div>
        <div class="col-12 d-flex align-items-center justify-content-center my-3">
            <input type="text" id="nombreContacto" name="nombreContacto" placeholder="@lang('app.contacto_form_nombre')" class="form-control" required>    
        </div>
        <div class="col-12 d-flex align-items-center justify-content-center my-3">
            <input type="text" id="apellidoContacto" name="apellidoContacto" placeholder="@lang('app.contacto_form_apellido')" class="form-control" required>
        </div>
        <div class="col-12 d-flex align-items-center justify-content-center my-3">
            <input type="email" id="emailContacto" name="emailContacto" placeholder="Email" class="form-control" required>
        </div>
        <div class="col-12 d-flex align-items-center justify-content-center my-3">
            <textarea id="mensajeContacto" name="mensajeContacto" placeholder="@lang('app.contacto_form_mensaje')" class="form-control"></textarea>
        </div>
        <div class="col-12">
            {!! NoCaptcha::renderJs() !!}
                {!! NoCaptcha::display() !!}
                @error('g-recaptcha-response')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
        </div>
        <div class="col-12 pt-3 pt-md-0 d-flex align-items-center justify-content-center">
            <button type="submit" class="btn form-control">@lang('app.contacto_form_boton_enviar')</button>
        </div>
    </form>
    <div class="col-12">
        <div class="row">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <a href="#" class="d-flex align-items-center justify-content-center"><img src="/imagenes/logosecundarioemail.png">
                <span class="LetraRemarcada ml-1">@lang('app.contacto_presupuesto')</span>
                <p class="pt-3 ml-1">presupuestos@futura.com.ar</p></a>
            </div>
            <div class="col-12 d-flex align-items-center justify-content-center">
                <a href="#" class="d-flex align-items-center justify-content-center"><img src="/imagenes/logosecundarioemail.png">
                <span class="LetraRemarcada ml-1">@lang('app.contacto_administracion_ventas')</span>
                <p class="pt-3 ml-1">oc@futura.com.ar</p></a>
            </div>
        </div>
    </div>
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


        // console.log($('.go-to-contacto'));
        $.each($('.go-to-contacto'), function(key, button){
            button.addEventListener('click', function(){
                $('html, body').animate({
                    scrollTop: $("#formularioContacto").offset().top
                }, 2000);
            })
        })
	</script>
@endsection
