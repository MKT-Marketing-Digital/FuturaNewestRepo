
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<link href="{{asset('css/fonts.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('css/fontawesome/css/all.min.css')}}">

<script src="{{asset('js/jquery/jquery.min.js')}}"></script>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link href="{{asset('css/azzara.min.css')}}" rel="stylesheet">

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{-- <link href="{{asset('summernote/summernote-lite.min.css')}}" rel="stylesheet">
<script src="{{asset('summernote/summernote-lite.min.js')}}"></script> --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="{{asset('summernote/lang/summernote-es-ES.js')}}"></script>
<script src="{{asset('js/jquery.validate/jquery.validate.min.js')}}"></script>
</head>
<body>
    <div class="wrapper">
		<!--
				Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" data-background-color="purple">
			<!-- Logo Header -->
			<div class="logo-header">
				
				<a href="#" class="logo">
					
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">
				
				<div class="container-fluid">
					
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret submenu">
							{{-- <a class="nav-link dropdown-toggle" href="{{route('notificaciones.index')}}" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							
								<i class="fa fa-bell"></i>
								@if ($count=Auth::user()->unreadNotifications->count())
								<span class="notification">{{$count}}</span>
								@endif
							
							</a> --}}
							{{-- <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li>
									<div class="dropdown-title">You have 4 new notification</div>
								</li>
								<li>
									<div class="scroll-wrapper notif-scroll scrollbar-outer" style="position: relative;"><div class="notif-scroll scrollbar-outer scroll-content" style="height: auto; margin-bottom: 0px; margin-right: 0px; max-height: 256px;">
										<div class="notif-center">
											<a href="#">
												<div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
												<div class="notif-content">
													<span class="block">
														New user registered
													</span>
													<span class="time">5 minutes ago</span> 
												</div>
											</a>
										
										</div>
									</div><div class="scroll-element scroll-x" style=""><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar ui-draggable ui-draggable-handle" style="width: 100px;"></div></div></div><div class="scroll-element scroll-y" style=""><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar ui-draggable ui-draggable-handle" style="height: 100px;"></div></div></div></div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul> --}}
						</li>
                        
                        <li class="nav-item dropdown">
                        <a class="btn btn-info" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Exit') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>
		<?php 
	$routeName = Route::currentRouteName();


/*switch ($routeName) {
	case 'inicio.sliders':
		$inicio_active = 'active';
		break;
	case 'inicio.editarContenido':
		$inicio_active = 'active';
		break;
	case 'empresa.editarContenido':
		$empresa_active = 'active';
		break;
	case 'sectores.editarContenido':
		$sectores_active= 'active';
	break;
	case 'laboratorio.sliders':
		$laboratorio_active='active';
		break;
	case 'laboratorio.editarContenido':
		$laboratorio_active='active';
		break; 
	case 'productos.editarContenido':
		$productos_active = 'active';
		break;
	case 'vermetadatos':
		$metadatos_active= 'active';
		break;
	case 'calidad.editarContenido':
		$calidad_active='active';
		break;
	case 'calidad.sliders':
		$calidad_active='active';
		break;
	case 'contacto.contenido':
		$contacto_active = 'active';
	break;	
	case 'usuarios.index':
		$usuarios_active = 'active';
		break;
	case 'verusuarios':
		$usuarios_active = 'active';
		break;
}*/
		?>
		<!-- Sidebar -->
		<div class="sidebar">
			
			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					
					<ul class="nav">
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Dashboard Futura</h4>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#slider">
								<i class="fas fa-home"></i>
								<p>Sliders</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="slider">
								<ul class="nav nav-collapse">
									<li>
									<a href="{{route('sliders.index')}}">
										<span class="sub-item">slider</span>
									</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#producto">
								<i class="fas fa-home"></i>
								<p>Productos</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="producto">
								<ul class="nav nav-collapse">
									<li>
									<a href="{{route('productos.index')}}">
										<span class="sub-item">producto</span>
									</a>
									</li>
								</ul>
							</div>
						</li>								
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
                @yield('contenido')
			</div>
			
		</div>
		
    </div>
    <script src="{{asset('js/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{asset('js/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>
    <script src="{{asset('js/ready.min.js')}}"></script>
    <script src="{{asset('js/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

</body>
</html>


   