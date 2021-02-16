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
						<h3 class="box-title">Nueva Persona</h3>
					</div>
					
					<form action="#" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="box-body">
							
							<input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">
							
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
									<input type="date" name="fechanaci_per" placeholder="Fecha de nacimiento" class="form-control" required>
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
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Usuario:</label>
								<div class="col-sm-10">
									<select name="id_usuario1" class="form-control select2" style="width: 100%;" required>
										<option value=''>Usuario</option>
										<?php
											require_once("../modelo/Usuario.php");
											$res2 = Usuario::read();
											while ($dato2 = mysqli_fetch_object($res2)){
												echo "<option value='".$dato2->id_usuario."'>".$dato2->id_usuario." - ".$dato2->nombre_usu."</option>";
											}
										?>
									</select>
								</div>
							</div>
							
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
		require_once("../controlador/ControladorPersona.php");
		ControladorPersona::create();
		?>
		
		<?php
		}
		ob_end_flush();
		?>
				