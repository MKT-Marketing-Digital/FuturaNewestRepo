<!DOCTYPE html> 
<html lang="en">
<head>
	<title>Futura, líderes en soluciones Metalúrgicas.</title>
	<link href="{{asset('css/fonts.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('css/fontawesome/css/all.min.css')}}">
<meta name="google-site-verification" content="DFXgMRCwlrt5XMwDNiTPlTsD5JxXeZXMOr2-LdgsCgo" />
<script src="{{asset('js/jquery/jquery.min.js')}}"></script>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="{{asset('js/jquery.validate/jquery.validate.min.js')}}"></script>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;700&display=swap" rel="stylesheet">
<link href="{{asset('css/pagina.css')}}" rel="stylesheet">




  <!-- Seccion scripts header -->
  @foreach ($scriptsHeader as $scriptHeader)
      {!! $scriptHeader->script !!}
  @endforeach
  <!-- Fin seccion scripts header -->
</head>
<body>
    
    <div class="container px-0 m-0">
        <div class="row m-0 justify-content-center"  >
                    
            <style>
                @media (min-width: 900px){
                    .padding-noResponsive{
                        padding-left: 100px !important; 
                        padding-right: 100px !important;
                    }
                }
            </style>
            
                    <!-- nuevo nav -->
                    <nav id="navbar" class="padding-noResponsive col-12 navbar top-bar fixed navbar-expand-lg navbar-light bg-transparent row justify-content-between" style="transform: translate(0px, 0px); ">
                        <div class="col-lg-2">
                            <a class="navbar-brand" href="{{route('InicioFront')}}"><img class="img-fluid" src="{{asset(Storage::url($logoIconoFutura->icono))}}"></a>
                        </div>
                        <button class="navbar-toggler d-lg-none d-block" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="transform: translate(250px, -50px);" id="button">
                            <span class="navbar-toggler-icon navbar-dark d-lg-none">
                                <i class="fas fa-bars" style="color:#fff; font-size:28px;"></i>
                            </span>
                        </button>
                    
                        <div class="collapse navbar-collapse col-xl-7 col-6-customizada p-0 text-center" id="navbarSupportedContent" >
                            <ul class="navbar-nav mr-auto ui-sortable d-flex justify-content-between">
                                <li class="nav-item"><a class="nav-link" href="{{route('InicioFront')}}">@lang('app.nav_inicio')</a></li>
                                <li class="nav-item"><a class="nav-link" href="https://blog.futura.com.ar/">BLOG</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('QuienesSomosFront')}}">@lang('app.nav_quienes_somos')</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('ProductosFront')}}">@lang('app.nav_productos')</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('DistribuidoresFront')}}">@lang('app.nav_distribuidores')</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('ServiciosFront')}}">@lang('app.nav_servicios')</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('DocumentosFront')}}">@lang('app.nav_documentos')</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('ContactoFront')}}">@lang('app.nav_contacto')</a></li>

                                <ul class="d-flex d-md-none position-absolute banderas-responsive" style="right: 0; top: 0;">
                                    <a class="navbar-brand m-0" href="/lang/es"><img src="{{asset(Storage::url('images/banderas/spain.png'))}}" alt="" style="height: 36px; width: 36px; border-radius: 50%; padding: 0 !important; margin-right: 10px;"></a>
                                    <a class="navbar-brand m-0" href="/lang/pt"><img src="{{asset(Storage::url('images/banderas/portugal.png'))}}" alt="" style="height: 36px; width: 36px; border-radius: 50%; padding: 0 !important; margin-right: 10px;"></a>
                                    <a class="navbar-brand m-0" href="/lang/en"><img src="{{asset(Storage::url('images/banderas/uk.png'))}}" alt="" style="height: 36px; width: 36px; border-radius: 50%; padding: 0 !important; margin-right: 10px;"></a>
                                </ul> 
                                <style>
                                    .banderas-responsive{
                                        transform: translateY(70px);
                                    }
                                </style>
                            </ul>
                            <ul class="d-none d-md-flex flex-column banderas" style="right: 0; top: 0; transform: translateY(100px)" id="banderas">
                                <a class="navbar-brand m-0" href="/lang/es"><img src="{{asset(Storage::url('images/banderas/spain.png'))}}" alt="" style="height: 40px; width: 40px; border-radius: 50%; padding: 0 !important; margin-bottom: 10px;"></a>
                                <a class="navbar-brand m-0" href="/lang/pt"><img src="{{asset(Storage::url('images/banderas/portugal.png'))}}" alt="" style="height: 40px; width: 40px; border-radius: 50%; padding: 0 !important; margin-bottom: 10px;"></a>
                                <a class="navbar-brand m-0" href="/lang/en"><img src="{{asset(Storage::url('images/banderas/uk.png'))}}" alt="" style="height: 40px; width: 40px; border-radius: 50%; padding: 0 !important; margin-bottom: 10px;"></a>
                            </ul> 
                            <style>
                                @media (max-width: 1400px){
                                    .banderas{
                                    transform: translateY(-900px);
                                    }
                                }

                                
                            </style>
                            <script>
                                const banderas = document.getElementById('banderas');
                                
                                window.addEventListener('scroll', function(){
                                    let y = window.scrollY;
                                    if(y<100){
                                        mostrar();
                                    }
                                    else{
                                        ocultar();
                                    }
                                })

                                const mostrar = () =>{
                                    banderas.style.transition="all .5s";
                                    banderas.style.opacity='1';
                                }

                                const ocultar = () =>{
                                    banderas.style.transition="all .5s";
                                    banderas.style.opacity='0';
                                }
                            </script>
                             
                            {{-- <li class="nav-item"><a class="navbar-brand m-0" href="/lang/es">Español</a></li>
                                <li class="nav-item"><a class="navbar-brand m-0" href="/lang/en">English</a></li>
                                <li class="nav-item"><a class="navbar-brand m-0" href="/lang/pt">Português</a></li> --}}
                        </div>
                        <style>
                            @media (min-width: 1400px){
                                .col-6-customizada{
                                    flex: 0 0 50% !important;
                                    max-width: 50% !important;
                                }
                            }
                            
                        </style>
                    </nav>
                    <script>
                        const navbarSupportedContent = document.getElementById('navbarSupportedContent');
                        const button = document.getElementById('button');
                        const ariaExpanded = button.getAttribute('aria-expanded');
                        let aux = 0;
                        
                        button.addEventListener('click', ()=> {
                            const navbarHeight = document.getElementById('navbar');
                            aux++;
                            if(aux % 2 == 0){
                                navbarHeight.style.height = "100px";
                            }
                            else{
                                navbarHeight.style.height = "280px";
                            }
                        })

                        
                        
                    </script>
            
               
        </div>
    </div>
    <div class="container p-0 m-0">
    @yield('contenido')
    </div>
    <footer>
    @include('footer')
    </footer>
    <script src="{{asset('js/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{asset('js/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>
    <script src="{{asset('js/ready.min.js')}}"></script>
    <script src="{{asset('js/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
	<script>function loadScript(a){var b=document.getElementsByTagName("head")[0],c=document.createElement("script");c.type="text/javascript",c.src="https://tracker.metricool.com/resources/be.js",c.onreadystatechange=a,c.onload=a,b.appendChild(c)}loadScript(function(){beTracker.t({hash:"a7c24bedc6b2afce0e00c3c9163c66ff"})});</script>
    <script>
        window.onscroll = function() {myFunction()};

            var navbar = document.getElementById("navbar");
            var sticky = navbar.offsetTop;

            function myFunction() {
            if (window.pageYOffset > sticky) {
                navbar.classList.add("sticky");
            } else {
                navbar.classList.remove("sticky");
            }
        }
    </script>
<!-- Seccion scripts body -->
    @foreach ($scriptsBody as $scriptBody)
        {!! $scriptBody->script !!}
    @endforeach
<!-- Fin seccion scripts body -->
</body>
</html>