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
								<!-- <li><a href="login.php"><i class="fas fa-user-check"></i> Login</a></li> -->
								<li><a href="register.php"><i class="fas fa-user-edit"></i> Registro</a></li>
							</ul>
						</div>
					</div>
				</nav>
			</header>
			
			
			<div class="login-box">
				<div class="login-logo">
					Login
				</div>
				<div class="login-box-body">
					<!-- <p class="login-box-msg">Login</p> -->
					<form action="#" method="POST" name="quickForm" id="quickForm" enctype="multipart/form-data">
						
						<div class="form-group has-feedback">
							<label>Usuario:</label>
							<input type="text" name="nombre_usu" value="" placeholder="Usuario" class="form-control" required>
						</div>
						
						<div class="form-group has-feedback">
							<label>Password:</label>
							<input type="password" name="password_usu" value="" placeholder="Password" class="form-control unmaskpassword" minlength="6" required>
						</div>
						
						<div class="form-group has-feedback">							
							<input class="form-check-input showPassword" type="checkbox">
							Mostrar contraseña
						</div>
						
						<div class="form-group has-feedback">
							<label>Rol:</label>
							<select name="id_rol1" class="form-control select2" style="width: 100%;" required>
								<option value=''>Seleccione su rol</option>
								<option value='1'>Administrador</option>
								<option value='2'>Cliente</option>								
								<option value='3'>Médico</option>
							</select>
						</div>
						
						<div class="row">
							<div class="col-xs-5">
								<button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fas fa-user-check"></i> Login</button>
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
			<!-- Bootstrap 4 -->
			<script src="../plugins/bootstrap/bootstrap.js"></script>
			<!-- Toastr -->
			<script src="../plugins/toastr/toastr.min.js"></script>
			<script src="../plugins/toastr/config.js"></script> 
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
				if(isset($_GET["msg"]) and !empty($_GET["msg"])){
					echo base64_decode($_GET["msg"]);
				}
			?>
			
			
			<?php
				if(isset($_POST) and !empty($_POST)){
					require_once("../modelo/Varios.php");
					$nombre_usu = Connection::sanitize($_POST["nombre_usu"]);
					$password_usu = md5(Connection::sanitize($_POST["password_usu"]));
					$id_rol1 = Connection::sanitize($_POST["id_rol1"]);
					$res = Varios::loginUsuario($nombre_usu, $password_usu, $id_rol1);
					
					if($res){
						// Variables de Sesión de la Tabla Usuario
						$_SESSION["id_usuario"] = $res->id_usuario;
						$_SESSION["nombre_usu"] = $res->nombre_usu;
						$_SESSION["password_usu"] = $res->password_usu;
						
						// Variables de Sesión de la Tabla Persona
						$_SESSION["id_persona"] = $res->id_persona;
						$_SESSION["cedula_per"] = $res->cedula_per;
						$_SESSION["nombre_per"] = $res->nombre_per;
						$_SESSION["apellido_per"] = $res->apellido_per;
						$_SESSION["email_per"] = $res->email_per;
						$_SESSION["telefono_per"] = $res->telefono_per;
						$_SESSION["direccion_per"] = $res->direccion_per;
						$_SESSION["ciudadresi_per"] = $res->ciudadresi_per;
						$_SESSION["fechanaci_per"] = $res->fechanaci_per;
						$_SESSION["genero_per"] = $res->genero_per;
						$_SESSION["id_usuario1"] = $res->id_usuario1;
						
						// Variables de Sesión de la Tabla PersonaRol
						$_SESSION["id_personarol"] = $res->id_personarol;
						$_SESSION["id_persona1"] = $res->id_persona1;
						$_SESSION["id_rol1"] = $res->id_rol1;
						
						// Variables de Sesión de la Tabla Rol
						$_SESSION["id_personarol"] = $res->id_personarol;
						$_SESSION["id_rol"] = $res->id_rol;
						$_SESSION["nombre_rol"] = $res->nombre_rol;
						
						// Variables de Sesión de la Tabla Medico
						$_SESSION["id_medico"] = $res->id_medico;
						$_SESSION["id_persona2"] = $res->id_persona2;
						
						// Variables de Sesión 
						$_SESSION["sesion"] = true;
						$_SESSION["rol"] = $res->nombre_rol;
						$_SESSION["token"] = md5(uniqid(mt_rand(), true));
						
						// Entrar a principal
						header ("Location: principal.php");
					}
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