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
						<h1>Servicios</h1>
					</section>
					
					<section class="content">
						<label>Área de exámenes</label>
						
						<p>Con camillas confortables, cada una con monitor, tomas de oxígeno y personal listo para atenderle.</p>
						
						<label>Sala de pacientes críticos</label>
						
						<p>Con el soporte vital más avanzado para atender al paciente en estado de gravedad.</p>
						
						<label>Unidad de cuidado coronario</label>
						
						<p>Permite el control y monitoreo de pacientes con problemas cardiovasculares.</p>
						
						<label>Sala de observación</label>
						
						<p>Dispone de dos salas de observación: una de mujeres y otra de hombres, lo cual permite al paciente menos crítico recuperarse de sus lesiones o enfermedad en un período de 24 horas.</p>
						
						<label>Sala de curaciones</label>
						
						<p>Donde serán atendidos todos aquellos problemas que demanden el servicio de cirugía menor.</p>
						
						<label>Salas múltiples</label>
						
						<p>Dispone de consultorios para atender las emergencias en Pediatría, Ginecología y Traumatología.</p>
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