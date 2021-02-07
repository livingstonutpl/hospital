<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		
		<title><?php require_once("../config/Config.php"); echo SYSTEM_NAME_LONG;?></title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 4 -->
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
	<body class="hold-transition <?php require_once("../config/Config.php"); echo SYSTEM_SKIN;?> sidebar-mini">
		<div class="wrapper">
			
			<!-- NAVEGACION -->
			<header class="main-header">
				<a href="#" class="logo"> 
					<span class="logo-mini"><?php require_once("../config/Config.php"); echo SYSTEM_NAME_SHORT;?></span>
					<span class="logo-lg"><?php require_once("../config/Config.php"); echo SYSTEM_NAME_LONG;?></span>
				</a>
				<nav class="navbar navbar-static-top"> 
					<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="">
						<i class="fas fa-bars"></i>
					</a>
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							
							<li class="user">
								<a href="principal.php">
									<i class="fas fa-user fa-1x"></i>
									<span class="hidden-xs">
										<?php echo ucfirst($_SESSION["rol"]); ?>
										<?php echo $_SESSION["nombre_per"]." ".$_SESSION["apellido_per"]; ?>
									</span>
								</a>
							</li>
							
							<li class="dropdown messages-menu">
								<a href="logout.php">
									<i class="fas fa-power-off"></i> Salir
								</a> 
							</li>
							
						</ul>
					</div>
				</nav>
			</header>
			
			<!-- INICIO SIDEBAR -->
			<aside class="main-sidebar"> 
				<section class="sidebar">
					<ul class="sidebar-menu" data-widget="tree">
						
						<?php
							require_once("../config/Menu.php");
						?>
						
					</ul>
				</section>
			</aside>																																																																																																																																																																																																																																																															