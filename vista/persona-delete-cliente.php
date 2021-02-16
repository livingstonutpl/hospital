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
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Eliminar Cliente</h3>
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
									<input type="text" name="cedula_per" value="<?php echo $res->cedula_per;?>" class="form-control" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Nombre:</label>
								<div class="col-sm-10">
									<input type="text" name="nombre_per" value="<?php echo $res->nombre_per;?>" class="form-control" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Apellido:</label>
								<div class="col-sm-10">
									<input type="text" name="apellido_per" value="<?php echo $res->apellido_per;?>" class="form-control" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Email:</label>
								<div class="col-sm-10">
									<input type="text" name="email_per" value="<?php echo $res->email_per;?>" class="form-control" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Teléfono:</label>
								<div class="col-sm-10">
									<input type="text" name="telefono_per" value="<?php echo $res->telefono_per;?>" class="form-control" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Dirección:</label>
								<div class="col-sm-10">
									<textarea rows="3" name="direccion_per" class="form-control" readonly><?php echo $res->direccion_per;?></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Ciudad de Residencia:</label>
								<div class="col-sm-10">
									<input type="text" name="ciudadresi_per" value="<?php echo $res->ciudadresi_per;?>" class="form-control" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Fecha de Nacimiento:</label>
								<div class="col-sm-10">
									<input type="text" name="fechanaci_per" value="<?php echo $res->fechanaci_per;?>" class="form-control" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Género:</label>
								<div class="col-sm-10">
									<input type="text" name="genero_per" value="<?php echo $res->genero_per;?>" class="form-control" readonly>
								</div>
							</div>
							
							<!-- <div class="form-group">
								<label class="col-sm-2 control-label">Usuario:</label>
								<div class="col-sm-10">
								<?php
									// require_once("../modelo/Usuario.php");
									// $res2 = Usuario::read();
									// while ($dato2 = mysqli_fetch_object($res2)){
									// if ($res->id_usuario1 == $dato2->id_usuario){
									// $id_usuario1 = $dato2->id_usuario." - ".$dato2->nombre_usu;
									// }
									// }
								?>
								<input type="text" name="id_usuario1" value="<?php echo $id_usuario1;?>" class="form-control" readonly>
								</div>
							</div> -->
							
						</div>
						<div class="box-footer">
							<p>¿Está seguro que desea eliminar el registro?</p>
							<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Eliminar</button>
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
		ControladorPersonaCliente::delete();
	?>
	
	<?php
	}
	ob_end_flush();
?>
