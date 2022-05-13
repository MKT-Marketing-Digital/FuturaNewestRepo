@extends('layoutPagina')
@section('contenido')
        <div classs="container">
            <div class="row m-0 margen-contenido height-slider">
                <div class="col-12 px-0 ">
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
            <div class="row m-0 RowDocumentosColorOscuro">
                <div class="col-12 d-flex align-items-center justify-content-center py-3">
                    <h5>@lang('app.nav_documentos')</h5>
                </div>
            </div>
            <div class="row m-0 RowDocumentosGris">
                <div class="col-12 d-flex align-items-center justify-content-center py-3">
                    <p> @lang('app.subtitulo_documentos') </p>
                </div>
            </div>
            <div class="row m-0 RowDocumentosGris">
                <div class="col-12 col-md-6">
                    <div class="row pr-2 py-2">
                        @for($i = 0; $i < 3; $i++)
                            <div class="col-12 ColDocumentosBlanca mb-3">
                                <div class="row py-3">
                                    <div class="col-12 pl-3 py-2">
                                        <h3>{{$categorias[$i]->titulo}}</h3>
                                    </div>
                                    @php $documentos = $categorias[$i]->documentos()->get(); @endphp
                                    @if($documentos)
                                        @foreach($documentos as $documento)
                                            <div class="col-12 pl-3 py-2 d-flex">
                                                <a href="/storage/{{$documento->archivo}}" class="d-flex align-items-center">
                                                    <img src="/imagenes/pdf.png">
                                                    <p class="m-0 pl-2">{{$documento->nombre}}</p>
                                                </a>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="col-md-6 col-12 pl-0 pl-md-1">
                    <div class="row pl-2 mb-4 py-2">
                        <div class="col-12 ColDocumentosBlanca">
                            <div class="row m-0 py-3">
                                <div class="col-12 pl-3 py-2">
                                    <h3>{{$categorias[$i]->titulo}}</h3>
                                </div>
                                @php $documentos = $categorias[$i]->documentos()->get(); @endphp
                                @if($documentos)
                                    @foreach($documentos as $documento)
                                        <div class="col-12 pl-3 py-2 d-flex">
                                            <a href="/storage/{{$documento->archivo}}" class="d-flex align-items-center">
                                                <img src="/imagenes/pdf.png">
                                                <p class="m-0 pl-2">{{$documento->nombre}}</p>
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="row m-0 py-3">
                                @php $sub_categorias = $categorias[3]->subcategorias()->get(); @endphp
                                @foreach($sub_categorias as $sub_categoria)
                                    <div class="col-12 pl-3 py-2">
                                        <h4>{{$sub_categoria->titulo}}</h4>
                                    </div>
                                    @php $documentos = $sub_categoria->documentos()->get(); @endphp
                                    @if($documentos)
                                        @foreach($documentos as $documento)
                                            <div class="col-12 pl-3 py-2">
                                                <a href="/storage/{{$documento->archivo}}" class="d-flex align-items-center">
                                                    <img src="/imagenes/pdf.png">
                                                    <p class="m-0 pl-2">{{$documento->nombre}}</p>
                                                </a>
                                            </div>
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection