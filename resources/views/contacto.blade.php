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
            <div class="row m-0 RowContactoColorOscuro d-flex align-items-center justify-content-center">
                <div class="col-12 d-flex align-items-center justify-content-center py-3">
                    <h5>@lang('app.nav_contacto')</h5>
                </div>
            </div>
            <div class="row m-0 pb-3 pt-4 RowFormularioDeContacto d-flex align-items-center justify-content-center">
                <form method="POST" action="{{route('EnviarConsulta')}}" class="form-group" id="formularioContacto" name="formularioContacto">
                    @csrf
                    <div class="col-12">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                <h1>Exitos!</h1>
                            {{-- @lang('app.mensajeFormulario') --}}
                            </div>
                        @endif
                        @if (session()->has('error'))
                        <div class="alert alert-danger">
                            <h1>Deny!</h1>
                            {{-- {{session()->get('error')}} --}}
                        </div>
                        @endif
                    </div>
                    <div class="col-12 d-flex align-items-center justify-content-center">
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
                            <a href="mailto:presupuestos@futura.com.ar" class="d-flex align-items-center justify-content-center"><img src="/imagenes/logosecundarioemail.png">
                            <span class="LetraRemarcada ml-1">@lang('app.contacto_presupuesto')</span>
                            <p class="pt-3 ml-1">presupuestos@futura.com.ar</p></a>
                        </div>
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <a href="mailto:oc@futura.com.ar" class="d-flex align-items-center justify-content-center"><img src="/imagenes/logosecundarioemail.png">
                            <span class="LetraRemarcada ml-1">@lang('app.contacto_administracion_ventas')</span>
                            <p class="pt-3 ml-1">oc@futura.com.ar</p></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection