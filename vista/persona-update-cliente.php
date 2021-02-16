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
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Actualizar Cliente</h3>
					</div>
					
					<!-- <?php
						if(isset($_GET["id_persona"]) and !empty($_GET["id_persona"])){
							require_once("../modelo/Persona.php");
							$id_persona = Connection::sanitize($_GET["id_persona"]);
							$res = persona::single_row($id_persona);
						}
					?> -->
					
					<form action="#" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="box-body">
							
							<input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Id:</label>
								<div class="col-sm-10">
									<input type="text" name="id_persona" value="<?php echo $res->id_persona;?>" class="form-control" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Cedula:</label>
								<div class="col-sm-10">
									<input type="text" name="cedula_per" value="<?php echo $res->cedula_per;?>" class="form-control" required autofocus>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Nombre:</label>
								<div class="col-sm-10">
									<input type="text" name="nombre_per" value="<?php echo $res->nombre_per;?>" class="form-control" required>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Apellido:</label>
								<div class="col-sm-10">
									<input type="text" name="apellido_per" value="<?php echo $res->apellido_per;?>" class="form-control" required>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Email:</label>
								<div class="col-sm-10">
									<input type="email" name="email_per" value="<?php echo $res->email_per;?>" class="form-control" required>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Telefono:</label>
								<div class="col-sm-10">
									<input type="text" name="telefono_per" value="<?php echo $res->telefono_per;?>" class="form-control" required>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Dirección:</label>
								<div class="col-sm-10">
									<textarea rows="3" name="direccion_per" class="form-control" required><?php echo $res->direccion_per;?></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Ciudad de Residencia:</label>
								<div class="col-sm-10">
									<input type="text" name="ciudadresi_per" value="<?php echo $res->ciudadresi_per;?>" class="form-control" required>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Fecha de Nacimiento:</label>
								<div class="col-sm-10">
									<input type="date" name="fechanaci_per" value="<?php echo $res->fechanaci_per;?>" class="form-control" required>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Género:</label>
								<div class="col-sm-10">
									<div class="radio">
										<label><input <?php if($res->genero_per == "masculino"){ echo "checked"; } ?> type="radio" name="genero_per" value="masculino">masculino</label>
									</div>
									<div class="radio">
										<label><input <?php if($res->genero_per == "femenino"){ echo "checked"; } ?> type="radio" name="genero_per" value="femenino">femenino</label>
									</div>
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
									// $selected = ($res->id_usuario1 == $dato2->id_usuario) ? "selected" : "" ;
									// echo "<option ".$selected." value='".$dato2->id_usuario."'>".$dato2->id_usuario." - ".$dato2->nombre_usu."</option>";
									// }
								?>
								</select>
								</div>
							</div> -->			
							
							<!-- EL USUARIO EN CLIENTE NO PERMITE ACTUALIZAR -->
							<input type="hidden" name="id_usuario1" value="<?php echo $res->id_usuario1;?>" class="form-control" required>
							
							
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-success"><i class="fas fa-sync-alt"></i> Actualizar</button>
							<a class="btn btn-info" href="persona-read-cliente.php" role="button"><i class="fas fa-times"></i> Cancelar</a>
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
		require_once("../controlador/ControladorPersonaCliente.php");
		ControladorPersonaCliente::update();
	?>
	
	<?php
	}
	ob_end_flush();
?>
