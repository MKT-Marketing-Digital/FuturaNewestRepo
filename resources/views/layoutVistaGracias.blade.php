
<!DOCTYPE html> 
<html lang="en">
<head>
	<link href="{{asset('css/fonts.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('css/fontawesome/css/all.min.css')}}">

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
<!-- Código de instalación Cliengo para http://www.futura.com.ar -->

<script type="text/javascript">(function () {

    var ldk = document.createElement('script');
  
    ldk.type = 'text/javascript';
  
    ldk.async = true;
  
    ldk.src = 'https://s.cliengo.com/weboptimizer/5d7a902ee4b0327583082266/5d7a9030e4b0327583082269.js';
  
    var s = document.getElementsByTagName('script')[0];
  
    s.parentNode.insertBefore(ldk, s);
  
  })();</script>

  <!-- Seccion scripts header -->
  @foreach ($scriptsHeader as $scriptHeader)
      {!! $scriptHeader->script !!}
  @endforeach
  <!-- Fin seccion scripts header -->
</head>
<body>
    <div class="container p-0 m-0">
    @yield('contenido')
    </div>
    <footer>
    @include('footerGracias')
    </footer>
    <script src="{{asset('js/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{asset('js/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>
    <script src="{{asset('js/ready.min.js')}}"></script>
    <script src="{{asset('js/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
<!-- Seccion scripts body -->
    @foreach ($scriptsBody as $scriptBody)
        {!! $scriptBody->script !!}
    @endforeach
<!-- Fin seccion scripts body -->
</body>
</html>