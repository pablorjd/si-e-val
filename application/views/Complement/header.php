<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<title>Sieval <?=date('Y')?> </title>
		<meta name="description" content="">
		<meta name="author" content="">
			
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<!-- #CSS Links -->
		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?=base_url();?>assets/css/bootstrap.min.css">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    
		<!-- SmartAdmin Styles : Please note (smartadmin-production.css) was created using LESS variables -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?=base_url();?>assets/css/smartadmin-production.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?=base_url();?>assets/css/smartadmin-skins.min.css">

		<!-- SmartAdmin RTL Support is under construction
			 This RTL CSS will be released in version 1.5
		<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-rtl.min.css"> -->

		<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		<link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?=base_url();?>assets/css/my_style.css">

		<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?=base_url();?>assets/css/demo.min.css">

		<!-- #FAVICONS -->
		<link rel="shortcut icon" href="https://www.directemar.cl/templates/directemar/favicon.ico" type="image/x-icon">
		<link rel="icon" href="https://www.directemar.cl/templates/directemar/favicon.ico" type="image/x-icon">

		<!-- #GOOGLE FONT -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

		<!-- #APP SCREEN / ICONS -->
		<!-- Specifying a Webpage Icon for Web Clip 
			 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
		<link rel="apple-touch-icon" href="<?=base_url();?>assets/img/splash/sptouch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url();?>assets/img/splash/touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?=base_url();?>assets/img/splash/touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?=base_url();?>assets/img/splash/touch-icon-ipad-retina.png">
		
		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		
		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="<?=base_url();?>assets/img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="<?=base_url();?>assets/img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="<?=base_url();?>assets/img/splash/iphone.png" media="screen and (max-device-width: 320px)">
		<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script><!--Chart.min.js cdn-->
		<!-- data table -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?=base_url();?>assets/css/dataTables.bootstrap.min.css">
		<!-- <script src="<?=base_url();?>assets/js/jquery.dataTables.min.js"></script> -->
		<!-- <script src="<?=base_url();?>assets/js/dataTables.bootstrap.min.js"></script> -->



		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="<?=base_url();?>assets/js/jquery.min.js"></script><!--jquery.min.js-->
		<script src="<?=base_url();?>assets/js/underscore.min.js"></script>  <!--underscore.min.js-->
		<script src="<?=base_url();?>assets/js/jspdf.min.js"></script>  <!--underscore.min.js-->
        <!-- fin data table  -->
	</head>
	<header id="header">
	<div id="logo-group">

		<!-- PLACE YOUR LOGO HERE -->
		<span id="logo"> 
			<!-- <img src="<?=base_url();?>assets/img/Lk-logo.png" alt="Lionel Kovacs">  -->
			<!-- <img src="<?=base_url();?>assets/img/logoABS.png" alt="AS-Sistem">  -->
			<a href="<?=base_url();?>Dashboard">
				<!--img src="http://www.directemar.cl/images/phocagallery/Logos/thumbs/phoca_thumb_l_DIRECTEMAR0.jpg" alt="Select-Ing."-->
				<img src="<?=base_url();?>assets/img/logo_tecmar_azul.png" alt="Tecmar" style="width: 220px;">
				
			</a>
			
		</span>
		<!-- END LOGO PLACEHOLDER -->

		<!-- Note: The activity badge color changes when clicked and resets the number to 0
			 Suggestion: You may want to set a flag when this happens to tick off all checked messages / notifications -->
		<!--span id="activity" class="activity-dropdown"> <i class="fa fa-user"></i> <b class="badge" id="novedades-notificacion"> 0 </b> </span>

		<!- AJAX-DROPDOWN : control this dropdown height, look and feel from the LESS variable file ->
		<div class="ajax-dropdown">

			
			<div class="btn-group btn-group-justified" data-toggle="buttons">
				<label class="btn btn-default" onclick="getChequesCobrar()">
					<input type="radio" name="activityAjax" >
					Cheques por cobrar <span id="novedades-notificacion-cheques" class="badge">0</span></label>
				<label class="btn btn-default" onclick="getDatosErrados()">
					<input type="radio" name="activityAjax" >
					Datos faltantes <span id="novedades-notificacion-errados" class="badge">0</span></label>

			</div>

			<!- notification content ->
			<div class="ajax-notifications custom-scroll">

				<div class="alert alert-transparent" id="get-info-opc">
					<h4>Seleccione la opción para mostrar los datos. </h4>
					
				</div>

				<i class="fa fa-lock fa-4x fa-border"></i>

			</div>
			<!-- end notification content -->

			<!-- footer: refresh area >
			<span> Last updated on: 12/12/2013 9:43AM
				<button type="button" data-loading-text="<i class='fa fa-refresh fa-spin'></i> Loading..." class="btn btn-xs btn-default pull-right">
					<i class="fa fa-refresh"></i>
				</button> </span>
			<!- end footer ->

		</div>
		<!-- END AJAX-DROPDOWN -->
	</div>


	<?php
		/*
	<!-- #PROJECTS: projects dropdown -->
	<div class="project-context hidden-xs">

		<span class="label">Act.:</span>
		<span class="project-selector dropdown-toggle" data-toggle="dropdown">Act. <i class="fa fa-angle-down"></i></span>

		<!-- Suggestion: populate this list with fetch and push technique -->
		<ul class="dropdown-menu">
			<li>
				<a href="javascript:void(0);">Online e-merchant management system - attaching integration with the iOS</a>
			</li>
			<li>
				<a href="javascript:void(0);">Notes on pipeline upgradee</a>
			</li>
			<li>
				<a href="javascript:void(0);">Assesment Report for merchant account</a>
			</li>
			<li class="divider"></li>
			<li>
				<a href="javascript:void(0);"><i class="fa fa-power-off"></i> Clear</a>
			</li>
		</ul>
		<!-- end dropdown-menu-->

	</div>
		*/;?>
	<!-- end projects dropdown -->

	<!-- #TOGGLE LAYOUT BUTTONS -->
	<!-- pulled right: nav area -->
	<div class="pull-right">
		
		<!-- collapse menu button -->
		<div id="hide-menu" class="btn-header pull-right">
			<span> <a href="javascript:void(0);" data-action="toggleMenu" title="Menu"><i class="fa fa-reorder"></i></a> </span>
		</div>
		<!-- end collapse menu -->
		
		<!-- #MOBILE -->
		<!-- Top menu profile link : this shows only when top menu is active -->
		<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
			<li class="">
				<a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"> 
					<img src="<?=base_url();?>assets/img/avatars/sunny.png" alt="John Doe" class="online" />  
				</a>
				<ul class="dropdown-menu pull-right">
					<li>
						<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"><i class="fa fa-cog"></i> Setting</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="profile.html" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u>P</u>rofile</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="toggleShortcut"><i class="fa fa-arrow-down"></i> <u>S</u>hortcut</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="<?=base_url('index.php/Login/Logout');?>" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>
					</li>
				</ul>
			</li>
		</ul>

		
		<div id="logout" class="btn-header transparent pull-right">
			<span> <a href="<?=base_url('index.php/Login/Logout');?>" title="Salir" data-action="userLogout" data-logout-msg="¿Está seguro de cerrar sesión?"><i class="fa fa-sign-out"></i></a> </span>
		</div>
		
		
		<!-- end logout button -->

		<!-- search mobile button (this is hidden till mobile view port) -->
		<div id="search-mobile" class="btn-header transparent pull-right">
			<span> <a href="javascript:void(0)" title="Search"><i class="fa fa-search"></i></a> </span>
		</div>
		<!-- end search mobile button -->
		
		<!-- #SEARCH -->
		<!-- input: search field -->
		<!-- <form class="header-search pull-right" method="post" id="form-busca">
			<input id="search-fld" type="text" name="param" placeholder="Busque lo que quiera" onkeypress="enter(event)">
			<button type="button" onclick="Verifica()">
				<i class="fa fa-search"></i>
			</button>
			<a href="javascript:void(0);" id="cancel-search-js" title="Cancelar búsqueda"><i class="fa fa-times"></i></a>
		</form> -->
		<!-- end input: search field -->

		<!-- fullscreen button -->


		<div id="fullscreen" class="btn-header transparent pull-right">
			<span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Pantalla completa"><i class="fa fa-arrows-alt"></i></a> </span>
		</div>
		<!-- end fullscreen button -->
		
		<!-- #Voice Command: Start Speech >
		<div id="speech-btn" class="btn-header transparent pull-right hidden-sm hidden-xs">
			<div> 
				<a href="javascript:void(0)" title="Voice Command" data-action="voiceCommand"><i class="fa fa-microphone"></i></a> 
				<div class="popover bottom"><div class="arrow"></div>
					<div class="popover-content">
						<h4 class="vc-title">Voice command activated <br><small>Please speak clearly into the mic</small></h4>
						<h4 class="vc-title-error text-center">
							<i class="fa fa-microphone-slash"></i> Voice command failed
							<br><small class="txt-color-red">Must <strong>"Allow"</strong> Microphone</small>
							<br><small class="txt-color-red">Must have <strong>Internet Connection</strong></small>
						</h4>
						<a href="javascript:void(0);" class="btn btn-success" onclick="commands.help()">See Commands</a> 
						<a href="javascript:void(0);" class="btn bg-color-purple txt-color-white" onclick="$('#speech-btn .popover').fadeOut(50);">Close Popup</a> 
					</div>
				</div>
			</div>
		</div>
		<!-- end voice command -->

		<!-- multiple lang dropdown : find all flags in the flags page -->
		<ul class="header-dropdown-list hidden-xs">
			<!-- <li>
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="<?=base_url();?>assets/img/blank.gif" class="flag flag-cl" alt="Chile"> <span> Español (Chile) </span> <i class="fa fa-angle-down"></i> </a>
				<ul class="dropdown-menu pull-right">
					<li>
						<a href="javascript:void(0);"><img src="<?=base_url();?>assets/img/blank.gif" class="flag flag-cl" alt="Spanish"> Español (Chile)</a>
					</li>	
				</ul>
			</li> >
			<li>
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
				<!-- <img src="<?=base_url();?>assets/img/blank.gif" class="flag flag-cl" alt="Chile">  ->
					<span> 
						<strong>
							Establecimiento:
						</strong> <?=$_SESSION['Establecimiento'];?> 
					</span> 
					
					<?php
						$SwMuestra=0;
						if(sizeof($_SESSION['ArrayEstablecimiento'])>1){
							$SwMuestra=1;
						}

						if($SwMuestra==1){
					?>
					<i class="fa fa-angle-down"></i>
					
					<?php
						}
					?> 
				</a>

				<?php
					if($SwMuestra==1){
					?>
				<ul class="dropdown-menu pull-right">
					
					<?php
						// echo var_dump($_SESSION['ArrayEstablecimiento']);
						foreach ($_SESSION['ArrayEstablecimiento'] as $e) {
							if($e->IdEstablecimiento!=$_SESSION['IdEstablecimiento']){
						?>
						<li>
							<a href="javascript:void(0);" onclick="ConfirmaSucursal(<?=$e->IdEstablecimiento;?>,'<?=$e->Establecimiento;?>')">
								<!-- <img src="<?=base_url();?>assets/img/blank.gif" class="flag flag-cl" alt="Spanish">  ->
								<?=$e->Establecimiento;?>
							</a>
						</li>	

						<?php
							}
						}
					?>	
					
				</ul>
					<?php
						}
					?> 
			</li-->
		</ul>
		<!-- end multiple lang -->

	</div>
	<!-- end pulled right: nav area -->

<script type="text/javascript">
	

	

	function NombreFecha(Fecha){
		var NewFecha=Fecha.split('-');

		var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
	
		// alert(NewFecha[0]+' '+NewFecha[1]+' '+NewFecha[2])
		return (diasSemana[parseInt(NewFecha[2])]+' '+meses[parseInt(NewFecha[1]-1)]+' '+NewFecha[0]);
	}




	function enter(e){
        var k=null;
        (e.keyCode) ? k=e.keyCode : k=e.which;
        if(k==13){
          Verifica();
        } 
      }


	function Verifica(){
		
		if($("#search-fld").val()==''){
			alerta("Error","Favor de ingresar un texto a buscar!!");
			return 0;
		}else{
			$("#form-busca").prop('action','<?=base_url();?>index.php/Publico/getProblemasBuscador')
			$("#form-busca").submit();

		}

		//<form action="" class="header-search pull-right" method="post" onsubmit="Verifica()">
		
		return  0;
	}
	

	
</script>	



</header>

<body class="">
	<aside id="left-panel">

	<!-- User info -->
	<div class="login-info">
		<span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
			
			<a href="" id="show-shortcut" >
				<img src="<?=(isset($_SESSION['ImgUser'])?$_SESSION['ImgUser']:base_url().'assets/img/ico_boss.png');?>" alt="me" class="online" /> 

				<span>
					<?=(isset($_SESSION['Nombre'])?$_SESSION['Nombre']:'Usuario Nombre');?>
				</span>
				<!-- <i class="fa fa-angle-down"></i> -->
			</a> 
			
		</span>
	</div>
	<!-- end user info -->
	<nav>
		<ul>
			<li id="Dashboard">
				<a href="<?=base_url();?>Dashboard">
					<i class="fa fa-lg fa-fw fa-home"></i> 
					<span class="menu-item-parent">Inicio</span></a>
			</li>

			<li id="Evaluaciones">
				<a href="<?=base_url();?>Evaluaciones" >
					<i class="fa fa-lg fa-fw fa-calendar"></i> 
					<span class="menu-item-parent">Exámenes</span></a>
			</li>

			<!-- <li id="ListadoExamenes">
				<a href="<?=base_url();?>Evaluaciones/listaExamenes" title="Listado Examenes">
					<i class="fa fa-lg fa-fw fa-list-alt"></i> 
					<span class="menu-item-parent">Listado Examenes</span></a>
			</li> -->


			<li id="Preguntas">
				<a href="<?=base_url();?>Preguntas" >
					<i class="fa fa-lg fa-fw fa-graduation-cap"></i> 
					<span class="menu-item-parent">Preguntas</span></a>
			</li>
			<li id="Asignaturas">
				<a href="<?=base_url();?>Asignaturas" >
					<i class=" fa fa-lg fa-fwfa fa-book" aria-hidden="true"></i>
					<span class="menu-item-parent">Asignaturas</span></a>
			</li>
			<!-- <li id="Titulo">
				<a href="<?=base_url();?>TituloMantenedor/editar" title="Mantenedor de Títulos">
					<i class=" fa fa-lg fa-fwfa fa-book" aria-hidden="true"></i>
					<span class="menu-item-parent">Títulos/Asignaturas</span></a>
			</li> -->
			<li id="Titulo">
				<a href="<?=base_url();?>AreaMantenedor/vertitulos" >
					<i class=" fa fa-lg fa-fwfa fa-book" aria-hidden="true"></i>
					<span class="menu-item-parent">Títulos/Asignaturas</span></a>
			</li>
			<li id="TituloHabilitar">
				<a href="<?=base_url();?>AreaMantenedor/TituloMantendor/" >
					<i class=" fa fa-lg fa-fwfa fa-book" aria-hidden="true"></i>
					<span class="menu-item-parent">Habilitar Títulos</span></a>
			</li>
			<li id="Ensayo">
				<a href="<?=base_url();?>EnsayoController">
				<i class=" fa fa-lg fa-fwfa fa-book" aria-hidden="true"></i>
					<span class="menu-item-parent">Habilitar Ensayo en Edumar</span></a>
			</li>
			<li id="Areas">
				<a href="<?=base_url();?>AreaMantenedor/">
					<i class=" fa fa-lg fa-fwfa fa-book" aria-hidden="true"></i>
					<span class="menu-item-parent">Áreas/Personas</span></a>
			</li>
			</li>
			<li id="Tarifas">
				<a href="<?=base_url();?>TarifaMantenedor/">
					<i class=" fa fa-lg fa-fwfa fa-book" aria-hidden="true"></i>
					<span class="menu-item-parent">Tarifas / Prerrequisitos</span></a>
			</li>
		</ul>

		<!--ul>
			<li>
				<a href="index.html" title="Dashboard">
					<i class="fa fa-lg fa-fw fa-home"></i> 
					<span class="menu-item-parent">Dashboard</span></a>
			</li>
			<li>
				<a href="inbox.html"><i class="fa fa-lg fa-fw fa-inbox"></i> <span class="menu-item-parent">Inbox</span><span class="badge pull-right inbox-badge">14</span></a>
			</li>
			<li>
				<a href="#"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">Graphs</span></a>
				<ul>
					<li>
						<a href="flot.html">Flot Chaçrt</a>
					</li>
					<li>
						<a href="morris.html">Morris Charts</a>
					</li>
					<li>
						<a href="inline-charts.html">Inline Charts</a>
					</li>
					<li>
						<a href="dygraphs.html">Dygraphs <span class="badge pull-right inbox-badge bg-color-yellow">new</span></a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="fa fa-lg fa-fw fa-table"></i> <span class="menu-item-parent">Tables</span></a>
				<ul>
					<li>
						<a href="table.html">Normal Tables</a>
					</li>
					<li>
						<a href="datatables.html">Data Tables <span class="badge inbox-badge bg-color-greenLight">v1.10</span></a>
					</li>
					<li>
						<a href="jqgrid.html">Jquery Grid</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="fa fa-lg fa-fw fa-pencil-square-o"></i> <span class="menu-item-parent">Forms</span></a>
				<ul>
					<li>
						<a href="form-elements.html">Smart Form Elements</a>
					</li>
					<li>
						<a href="form-templates.html">Smart Form Layouts</a>
					</li>
					<li>
						<a href="validation.html">Smart Form Validation</a>
					</li>
					<li>
						<a href="bootstrap-forms.html">Bootstrap Form Elements</a>
					</li>
					<li>
						<a href="plugins.html">Form Plugins</a>
					</li>
					<li>
						<a href="wizard.html">Wizards</a>
					</li>
					<li>
						<a href="other-editors.html">Bootstrap Editors</a>
					</li>
					<li>
						<a href="dropzone.html">Dropzone </a>
					</li>
					<li>
						<a href="image-editor.html">Image Cropping <span class="badge pull-right inbox-badge bg-color-yellow">new</span></a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="fa fa-lg fa-fw fa-desktop"></i> <span class="menu-item-parent">UI Elements</span></a>
				<ul>
					<li>
						<a href="general-elements.html">General Elements</a>
					</li>
					<li>
						<a href="buttons.html">Buttons</a>
					</li>
					<li>
						<a href="#">Icons</a>
						<ul>
							<li>
								<a href="fa.html"><i class="fa fa-plane"></i> Font Awesome</a>
							</li>	
							<li>
								<a href="glyph.html"><i class="glyphicon glyphicon-plane"></i> Glyph Icons</a>
							</li>	
							<li>
								<a href="flags.html"><i class="fa fa-flag"></i> Flags</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="grid.html">Grid</a>
					</li>
					<li>
						<a href="treeview.html">Tree View</a>
					</li>
					<li>
						<a href="nestable-list.html">Nestable Lists</a>
					</li>
					<li>
						<a href="jqui.html">JQuery UI</a>
					</li>
					<li>
						<a href="typography.html">Typography</a>
					</li>
					<li>
						<a href="#">Six Level Menu</a>
						<ul>
							<li>
								<a href="#"><i class="fa fa-fw fa-folder-open"></i> Item #2</a>
								<ul>
									<li>
										<a href="#"><i class="fa fa-fw fa-folder-open"></i> Sub #2.1 </a>
										<ul>
											<li>
												<a href="#"><i class="fa fa-fw fa-file-text"></i> Item #2.1.1</a>
											</li>
											<li>
												<a href="#"><i class="fa fa-fw fa-plus"></i> Expand</a>
												<ul>
													<li>
														<a href="#"><i class="fa fa-fw fa-file-text"></i> File</a>
													</li>
													<li>
														<a href="#"><i class="fa fa-fw fa-trash-o"></i> Delete</a></li>
												</ul>
											</li>
										</ul>
									</li>
								</ul>
							</li>
							<li>
								<a href="#"><i class="fa fa-fw fa-folder-open"></i> Item #3</a>

								<ul>
									<li>
										<a href="#"><i class="fa fa-fw fa-folder-open"></i> 3ed Level </a>
										<ul>
											<li>
												<a href="#"><i class="fa fa-fw fa-file-text"></i> File</a>
											</li>
											<li>
												<a href="#"><i class="fa fa-fw fa-file-text"></i> File</a>
											</li>
										</ul>
									</li>
								</ul>

							</li>
						</ul>
					</li>
				</ul>
			</li>
		
			<li>
				<a href="calendar.html"><i class="fa fa-lg fa-fw fa-calendar"><em>3</em></i> <span class="menu-item-parent">Calendar</span></a>
			</li>
			<li>
				<a href="widgets.html"><i class="fa fa-lg fa-fw fa-list-alt"></i> <span class="menu-item-parent">Widgets</span></a>
			</li>
			<li>
				<a href="gallery.html"><i class="fa fa-lg fa-fw fa-picture-o"></i> <span class="menu-item-parent">Gallery</span></a>
			</li>
			<li>
				<a href="gmap-xml.html"><i class="fa fa-lg fa-fw fa-map-marker"></i> <span class="menu-item-parent">GMap Skins</span><span class="badge bg-color-greenLight pull-right inbox-badge">9</span></a>
			</li>
			<li class="active">
				<a href="#"><i class="fa fa-lg fa-fw fa-windows"></i> <span class="menu-item-parent">Miscellaneous</span></a>
				<ul>
					<li>
						<a href="#"><i class="fa fa-lg fa-fw fa-file"></i> Other Pages</a>
						<ul>
							<li>
								<a href="forum.html">Forum Layout</a>
							</li>
							<li>
								<a href="profile.html">Profile</a>
							</li>
							<li>
								<a href="timeline.html">Timeline</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="pricing-table.html">Pricing Tables</a>
					</li>
					<li>
						<a href="invoice.html">Invoice</a>
					</li>
					<li>
						<a href="login.html" target="_top">Login</a>
					</li>
					<li>
						<a href="register.html" target="_top">Register</a>
					</li>
					<li>
						<a href="lock.html" target="_top">Locked Screen</a>
					</li>
					<li>
						<a href="error404.html">Error 404</a>
					</li>
					<li>
						<a href="error500.html">Error 500</a>
					</li>
					<!-- <li class="active"> ->
					<li>
						<a href="blank_.html">Blank Page</a>
					</li>
					<li>
						<a href="email-template.html">Email Template</a>
					</li>
					<li>
						<a href="search.html">Search Page</a>
					</li>
					<li>
						<a href="ckeditor.html">CK Editor</a>
					</li>
				</ul>
			</li>
			<li class="top-menu-hidden">
				<a href="#"><i class="fa fa-lg fa-fw fa-cube txt-color-blue"></i> <span class="menu-item-parent">SmartAdmin Intel</span></a>
				<ul>
					<li>
						<a href="difver.html"><i class="fa fa-stack-overflow"></i> Different Versions</a>
					</li>
					<li>
						<a href="applayout.html"><i class="fa fa-cube"></i> App Settings</a>
					</li>
					<li>
						<a href="http://bootstraphunter.com/smartadmin/BUGTRACK/track_/documentation/index.html" target="_blank"><i class="fa fa-book"></i> Documentation</a>
					</li>
					<li>
						<a href="http://bootstraphunter.com/smartadmin/BUGTRACK/track_/" target="_blank"><i class="fa fa-bug"></i> Bug Tracker</a>
					</li>
				</ul>
			</li>
		</ul-->
	</nav>
	<span class="minifyme" data-action="minifyMenu"> 
		<i class="fa fa-arrow-circle-left hit"></i> 
	</span>

</aside>
		<!-- END NAVIGATION -->

