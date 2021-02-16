<?php
	ob_start();
	session_start();
	if (!isset($_SESSION["sesion"])){
	?>
	
	
	<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<title><?php require_once("../config/Config.php"); echo SYSTEM_NAME_LONG;?></title>
			<!-- Tell the browser to be responsive to screen width -->
			<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
			<!-- Bootstrap -->
			<link rel="stylesheet" href="../plugins/bootstrap/bootstrap.css">
			<!-- Font Awesome -->
			<link rel="stylesheet" href="../plugins/fontawesome/fontawesome.css">
			<!-- AdminLTE -->
			<link rel="stylesheet" href="../plugins/adminlte/adminlte.css">
			<link rel="stylesheet" href="../plugins/adminlte/skins.css">
			<link rel="stylesheet" href="../plugins/adminlte/fonts.css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> 
			<!-- Toastr -->
			<link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
		</head>
		
		<body class="hold-transition login-page layout-top-nav <?php require_once("../config/Config.php"); echo SYSTEM_SKIN;?> ">
			
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
								<!-- <li><a href="register.php"><i class="fas fa-user-edit"></i> Registro</a></li> -->
							</ul>
						</div>
					</div>
				</nav>
			</header>
			
			
			<div class="register-box">
				<div class="register-logo">
					Registro
				</div>
				<div class="register-box-body">
					<!-- <p class="login-box-msg">Registro</p> -->
					<form action="#" method="POST" name="quickForm" id="quickForm" enctype="multipart/form-data">
						
						<!-- TABLA PERSONA -->
						
						<div class="form-group has-feedback">
							<label>Cédula:</label>
							<input type="text" name="cedula_per" placeholder="Cédula" class="form-control" maxlength="10" minlength="10" required>
						</div>
						
						<div class="form-group has-feedback">
							<label>Nombre:</label>
							<input type="text" name="nombre_per" placeholder="Nombre" class="form-control" required>
						</div>
						
						<div class="form-group has-feedback">
							<label>Apellido:</label>
							<input type="text" name="apellido_per" placeholder="Apellido" class="form-control" required>
						</div>
						
						<div class="form-group has-feedback">
							<label>Email:</label>
							<input type="email" name="email_per" placeholder="Email" class="form-control" required>
						</div>
						
						<div class="form-group has-feedback">
							<label>Teléfono:</label>
							<input type="text" name="telefono_per" placeholder="Teléfono" class="form-control" required>
						</div>
						
						<div class="form-group has-feedback">
							<label>Dirección:</label>
							<textarea rows="3" name="direccion_per" class="form-control" placeholder="Dirección" required></textarea>
						</div>
						
						<div class="form-group has-feedback">
							<label>Ciudad de residencia:</label>
							<input type="text" name="ciudadresi_per" placeholder="Ciudad de residencia" class="form-control" required>
						</div>
						
						<div class="form-group has-feedback">
							<label>Fecha de nacimiento:</label>
							<input type="date" name="fechanaci_per" placeholder="Fecha de nacimiento" class="form-control" required>
						</div>
						
						<div class="form-group has-feedback">
							<label>Género:</label>
							<div class="radio">
								<label><input type="radio" name="genero_per" value="masculino" required>Masculino</label>
							</div>
							<div class="radio">
								<label><input type="radio" name="genero_per" value="femenino">Femenino</label>
							</div>
						</div>
						
						<!-- TABLA USUARIO -->
						
						<div class="form-group has-feedback">
							<label>Usuario:</label>
							<input type="text" name="nombre_usu" placeholder="Usuario" class="form-control" required>
						</div>
						
						<div class="form-group has-feedback">
							<label>Password:</label>
						<input type="password" name="password_usu" placeholder="Password" class="form-control unmaskpassword" required>
						</div>
						
						<div class="form-group has-feedback">							
						<input class="form-check-input showPassword" type="checkbox">
						Mostrar contraseña
						</div>
						
						<!-- <div class="form-group has-feedback">
						<label>Repita el Password:</label>
						<input type="password" name="password_usux" placeholder="Repita el Password" class="form-control">
						</div> -->
						
						<div class="row">
						<div class="col-xs-5">
						<button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fas fa-user-edit"></i> Registrarse</button>
						<button type="reset" class="btn btn-warning btn-block btn-flat"><i class="fas fa-times"></i> Reset</button>
						</div>
						</div>
						
						</form>
						</div>
						</div>
						
						
						<!-- jQuery 3 -->
						<script src="../plugins/jquery/jquery.min.js"></script>
						<!-- jQuery Validation -->
						<script src="../plugins/jquery-validation/jquery.validate.js"></script>
						<script src="../plugins/jquery-validation/additional-methods.js"></script>
						<!-- Bootstrap -->
						<script src="../plugins/bootstrap/bootstrap.js"></script>
						<!-- Toastr -->
						<script src="../plugins/toastr/toastr.min.js"></script>
						<script src="../plugins/toastr/config.js"></script> 
						<!-- AdminLTE -->
						<script src="../plugins/adminlte/adminlte.js"></script>
						<!-- SlideToTop -->
						<script src="../plugins/slidetotop/slideToTop.js"></script>
						
						<script type="text/javascript">				
						$(document).ready(function(){
						$('.showPassword').on('change',function(){
						var isChecked = $(this).prop('checked');
						if (isChecked) {
						$('.unmaskpassword').attr('type','text');
						} else {
						$('.unmaskpassword').attr('type','password');
						}
						});
						});
						</script>
						
						<?php
						if(isset($_POST) and !empty($_POST)){
						require_once("../modelo/Usuario.php");
						$nombre_usu = Connection::sanitize($_POST["nombre_usu"]);
						$password_usu = md5(Connection::sanitize($_POST["password_usu"]));
						$res1 = Usuario::create($nombre_usu, $password_usu);
						
						$ultimo_id_usuario = Usuario::ultimo_id()->id_usuario;
						
						require_once("../modelo/Persona.php");
						$cedula_per = Connection::sanitize($_POST["cedula_per"]);
						$nombre_per = Connection::sanitize($_POST["nombre_per"]);
						$apellido_per = Connection::sanitize($_POST["apellido_per"]);
						$email_per = Connection::sanitize($_POST["email_per"]);
						$telefono_per = Connection::sanitize($_POST["telefono_per"]);
						$direccion_per = Connection::sanitize($_POST["direccion_per"]);
						$ciudadresi_per = Connection::sanitize($_POST["ciudadresi_per"]);
						$fechanaci_per = Connection::sanitize($_POST["fechanaci_per"]);
						$genero_per = Connection::sanitize($_POST["genero_per"]);
						$id_usuario1 = $ultimo_id_usuario;
						$res2 = Persona::create($cedula_per, $nombre_per, $apellido_per, $email_per, $telefono_per, $direccion_per, $ciudadresi_per, $fechanaci_per, $genero_per, $id_usuario1);
						
						$ultimo_id_persona = Persona::ultimo_id()->id_persona;
						
						require_once("../modelo/Personarol.php");
						$id_persona1 = $ultimo_id_persona;
						$id_rol1 = 2;
						$res3 = Personarol::create($id_persona1, $id_rol1, $id_persona1."-2");
						
						if($res1 and $res2 and res3){
						$msg = base64_encode("<script>toastr.success('Registro guardado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('El registro no se pudo guardar');</script>");
						}
						
						header ("Location: login.php?msg=$msg");
						}
						?>
						
						
						
						</body>
						</html>
						
						
						<?php
						}else{
						header ("Location: principal.php");
						}
						ob_end_flush();
						?>																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																				