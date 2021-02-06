<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		
		<title><?php require_once("../config/Config.php"); echo SYSTEM_NAME_LONG;?></title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap -->
		<link rel="stylesheet" href="../plugins/bootstrap/bootstrap.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="../plugins/fontawesome/fontawesome.css">
		<!-- DataTables -->
		<link rel="stylesheet" href="../plugins/datatables/buttons.dataTables.min.css">
		<link rel="stylesheet" href="../plugins/datatables/responsive.dataTables.min.css">
		<link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.min.css">
		<!-- select2 (antes de AdminLTE) -->
		<link rel="stylesheet" href="../plugins/select2/select2.css">
		<!-- AdminLTE -->
		<link rel="stylesheet" href="../plugins/adminlte/adminlte.css">
		<link rel="stylesheet" href="../plugins/adminlte/skins.css">
		<link rel="stylesheet" href="../plugins/adminlte/fonts.css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> 
		<!-- Toastr -->
		<link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
	</head>
	<body class="hold-transition layout-top-nav <?php require_once("../config/Config.php"); echo SYSTEM_SKIN;?> ">
		
		<div class="wrapper">
			
			<header class="main-header">
				<nav class="navbar navbar-static-top">
					<div class="container">
						<div class="navbar-header">
							<a href="portada.php" class="navbar-brand"><i class="fas fa-home"></i> Inicio</a>
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
								<i class="fa fa-bars"></i>
							</button>
						</div> 
						<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
							<ul class="nav navbar-nav">
								<li><a href="nosotros.php"><i class="fas fa-users"></i> Nosotros</a></li>
								<li><a href="servicios.php"><i class="fas fa-concierge-bell"></i> Servicios</a></li>
								<li><a href="contacto.php"><i class="fas fa-phone-volume"></i> Contacto</a></li>
							</ul>
						</div>
						<div class="navbar-custom-menu">
							<ul class="nav navbar-nav">
								<li><a href="login.php"><i class="fas fa-user-check"></i> Login</a></li>
								<li><a href="register.php"><i class="fas fa-user-edit"></i> Registro</a></li>
							</ul>
						</div>
					</div>
				</nav>
			</header>
			
			
			
			<div class="content-wrapper">
				<div class="container">
					
					<section class="content-header text-center text-primary">
						<h1>Contacto</h1>
					</section>
					
					<section class="content">
						
						<label>TELÉFONO DE INFORMACIÓN:</label>
						<p>(02) 123-4567 ext: 9999</p>
						
						<label>TELÉFONO DE CALL CENTER:</label>
						<p>(02) 394-2800 ext: 3046</p>
						
						<label>TIPO:</label>
						<p>HOSPITAL DE ESPECIALIDADES</p>
						
						<label>Número de camas:</label>
						<p>121</p>
						
						<label>LUGAR:</label>
						<p>Pichincha, Quito</p>
						
						<label>DIRECCIÓN:</label>
						<p>Av. Juan José 123 y Antonio X</p>
						
						<label>SERVICIOS:</label>
						<p>25 Especialidades como: Cardiología, Neurología, Neumología, Psicología entre otras y 23 Consultorios para Consulta Externa</p>
						
						<label>EQUIPAMIENTO:</label>
						<p>Imagenología: Ecosonografía, Tomografía, equipos de RX, Laboratorios Clínico e Histopatológico, Farmacia, etc.</p>
						
						<label>HORARIOS DE ATENCIÓN:</label>
						<p>Emergencia: las 24 horas.</p>
						<p>Consulta Externa: de 06h00 a 18h00 de lunes a sábado</p>
						
						<label>SITIO WEB:</label>
						<p>www.hnfamilia.com.ec</p>
						
					</section>
					
					<section class="content-header text-center text-primary">
						<h1>Nuestras Redes Sociales</h1>
					</section>
					
					<section class="content">
						
						<div class="box-body">
							<div class="text-center">
								<a target="_blank" href="https://www.youtube.com/hospitalnuestrafamilia" class="btn btn-social-icon btn-google"><i class="fab fa-youtube"></i></a>
								<a target="_blank" href="https://www.facebook.com/hospitalnuestrafamilia" class="btn btn-social-icon btn-facebook"><i class="fab fa-facebook-f"></i></a>
								<a target="_blank" href="https://www.twitter.com/hospitalnuestrafamilia" class="btn btn-social-icon btn-twitter"><i class="fab fa-twitter"></i></a>
								<a target="_blank" href="https://www.google.com/hospitalnuestrafamilia" class="btn btn-social-icon btn-google"><i class="fab fa-google"></i></a>
								<a target="_blank" href="https://www.instagram.com/hospitalnuestrafamilia" class="btn btn-social-icon btn-instagram"><i class="fab fa-instagram"></i></a>
								<a target="_blank" href="https://www.linkedin.com/hospitalnuestrafamilia" class="btn btn-social-icon btn-linkedin"><i class="fab fa-linkedin-in"></i></a>
								<a target="_blank" href="https://www.dropbox.com/hospitalnuestrafamilia" class="btn btn-social-icon btn-dropbox"><i class="fab fa-dropbox"></i></a>
							</div>
						</div>
						
						<br>
						
						<div class="box box-primary"> 
							<div class="text-center">
								<div class="box-header with-border">
									<h4>Nuestra ubicación</h4>
								</div>
								<div class="box-body">
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.7775011109366!2d-78.5271285666009!3d-0.25917544699290723!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d598fe4fe8fc69%3A0x509905a89a366d84!2sHospital%20del%20IESS%20Quito%20Sur!5e0!3m2!1ses!2sec!4v1611426053258!5m2!1ses!2sec" width="800" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
								</div>
							</div>
						</div>
						
					</section>
					
					
					<section class="content">						
						<h4>Contador de visitas</h4>
						<div id="sfcffkgmf2d7suz23jy79l6429dqcaktpmj"></div>
						<img src="http://www.websmultimedia.com/contador-de-visitas.php?id=289744">											
					</section>
					
					
					
				</section>
				
				
			</div>
		</div>
		
		
		<?php
			require_once("footer.php");
		?>																				