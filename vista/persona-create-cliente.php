<?php
	ob_start();
	session_start();
	if (!isset($_SESSION["sesion"])){
		header("Location: login.php");
		}else{
		require_once("header.php");
		if ($_SESSION["rol"] == "administrador"){
		?>
		
		<div class="content-wrapper">
			<section class="content">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Nuevo Cliente</h3>
					</div>
					
					<form action="#" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="box-body">
							
							<input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">
							
							<!-- *************************************** -->
							<!-- ************ PERSONA ****************** -->
							<!-- *************************************** -->
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Cedula:</label>
								<div class="col-sm-10">
									<input type="text" name="cedula_per" placeholder="Cedula" class="form-control" maxlength="10" minlength="10" required autofocus>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Nombre:</label>
								<div class="col-sm-10">
									<input type="text" name="nombre_per" placeholder="Nombre" class="form-control" required>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Apellido:</label>
								<div class="col-sm-10">
									<input type="text" name="apellido_per" placeholder="Apellido" class="form-control" required>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Email:</label>
								<div class="col-sm-10">
									<input type="email" name="email_per" placeholder="Email" class="form-control" required>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Teléfono:</label>
								<div class="col-sm-10">
									<input type="text" name="telefono_per" placeholder="Teléfono" class="form-control" required>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Dirección:</label>
								<div class="col-sm-10">
									<textarea rows="3" name="direccion_per" class="form-control" placeholder="Dirección" required></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Ciudad de Residencia:</label>
								<div class="col-sm-10">
									<input type="text" name="ciudadresi_per" placeholder="Ciudad de residencia" class="form-control" required>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Fecha de Nacimiento:</label>
								<div class="col-sm-10">
									<input type="date" name="fechanaci_per" placeholder="Fecha de nacimiento" max="<?php echo gmdate("Y-m-d",time() + 3600*(-5+date("I"))); ?>" class="form-control" required>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Género:</label>
								<div class="col-sm-10">
									<div class="radio">
										<label><input type="radio" name="genero_per" value="masculino">masculino</label>
									</div>
									<div class="radio">
										<label><input type="radio" name="genero_per" value="femenino">femenino</label>
									</div>
								</div>
							</div>
							
							<!-- *************************************** -->
							<!-- ************ USUARIO ****************** -->
							<!-- *************************************** -->
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Usuario:</label>
								<div class="col-sm-10">
									<input type="text" name="nombre_usu" placeholder="Usuario" class="form-control" required autofocus>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Password:</label>
								<div class="col-sm-10">
									<input type="password" name="password_usu" placeholder="Password" class="form-control" required>
								</div>
							</div>
							
							<!-- <div class="form-group">
								<label class="col-sm-2 control-label">Usuario:</label>
								<div class="col-sm-10">
								<select name="id_usuario1" class="form-control select2" style="width: 100%;" required>
								<option value=''>Usuario</option>
								<?php
									// require_once("../modelo/Usuario.php");
									// $res2 = Usuario::read();
									// while ($dato2 = mysqli_fetch_object($res2)){
									// echo "<option value='".$dato2->id_usuario."'>".$dato2->id_usuario." - ".$dato2->nombre_usu."</option>";
									// }
								?>
								</select>
								</div>
							</div> -->
							
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
							<a class="btn btn-info" href="persona-read.php" role="button"><i class="fas fa-times"></i> Cancelar</a>
						</div>
					</form> 
				</div>
			</section>
		</div>
		
		<?php
			}else{
			require_once("noacceso.php");
		}
		require_once("footer.php");
	?>
	
	<?php
		
		if(isset($_POST) && !empty($_POST)){
			
			// **********************
			// USUARIO
			// **********************
			require_once("../modelo/Usuario.php");
			$nombre_usu = Connection::sanitize($_POST["nombre_usu"]);
			$password_usu = md5(Connection::sanitize($_POST["password_usu"]));
			$res1 = Usuario::create($nombre_usu, $password_usu);
			
			$ultimo_id_usuario = Usuario::ultimo_id()->id_usuario;
			
			// **********************
			// PERSONA
			// **********************
			
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
			
			// **********************
			// ROL
			// **********************
			
			require_once("../modelo/Personarol.php");
			$id_persona1 = $ultimo_id_persona;
			$id_rol1 = 2;
			$res3 = Personarol::create($id_persona1, $id_rol1, $id_persona1."-".$id_rol1);
			
			if($res1 and $res2 and res3){
				$msg = base64_encode("<script>toastr.success('Registro guardado correctamente');</script>");
				}else{
				$msg = base64_encode("<script>toastr.error('El registro no se pudo guardar');</script>");
			}
			
			header ("Location: persona-read.php?msg=$msg");
		}	
		
		// ESTE CODIGO ESTABA ORIGINAL DE ESTE CRUD
		// require_once("../controlador/ControladorPersona.php");
		// ControladorPersona::create();
	?>
	
	<?php
	}
	ob_end_flush();
?>
