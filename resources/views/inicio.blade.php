@extends('layoutPagina')
@section('contenido')
<link rel="stylesheet" href="{{asset('css/inicio.css')}}">
        <div classs="container m-0">
        <div class="m-0 p-0 d-none">
            <span id="idiomaImagenSlider">@lang('app.imagen_slider')</span>
        </div>
            <div class="modal-wrapper" id="popup">  
                <div class="popup-contenedor" style="max-width: 500px">
             	<img src="{{asset(Storage::url($logoPopUp->icono))}}" id="imagen_español"/>
                <img src="{{asset(Storage::url($logoPopUp->icono_ingles))}}" id="imagen_ingles"/>
                <img src="{{asset(Storage::url($logoPopUp->icono_portugues))}}" id="imagen_portugues"/>
        <!--Script para seleccionar imagen segun idioma -->
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
                 <a class='cerrar' href='javascript:void(0);' onclick='document.getElementById(&apos;popup&apos;).className = &apos;oculto&apos;' style="margin-right: 10px;margin-top: 10px;">x</a>
                
                </div> 
            </div>
            <div class="row m-0">
                <div class="col-12 px-0 ">
                    <div id="carouselSliderInicio" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($sliders as $slider)
                                @if ($loop->first)
                                <div class="carousel-item active">
                                    <img src="{{asset(Storage::url($slider->imagen))}}" class="d-block w-100" alt="">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>{!!$slider->texto!!}</h5>
                                    </div>
                                </div>
                                @else
                                <div class="carousel-item">
                                    <img src="{{asset(Storage::url($slider->imagen))}}" class="d-block w-100" alt="">
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
        </div>
        
        </div>
@endsection
