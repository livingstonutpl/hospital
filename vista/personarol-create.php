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
						<h3 class="box-title">Nuevo Rol de Persona</h3>
					</div>
					
					<form action="#" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="box-body">
							
							<input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Persona:</label>
								<div class="col-sm-10">
									<select name="id_persona1" class="form-control select2" style="width: 100%;" required autofocus>
										<option value=''>Persona</option>
										<?php
											require_once("../modelo/Persona.php");
											$res2 = Persona::read();
											while ($dato2 = mysqli_fetch_object($res2)){
												echo "<option value='".$dato2->id_persona."'>".$dato2->cedula_per." - ".$dato2->nombre_per." ".$dato2->apellido_per."</option>";
											}
										?>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Rol:</label>
								<div class="col-sm-10">
									<select name="id_rol1" class="form-control select2" style="width: 100%;" required>
										<option value=''>Rol</option>
										<?php
											require_once("../modelo/Rol.php");
											$res2 = Rol::read();
											while ($dato2 = mysqli_fetch_object($res2)){
											echo "<option value='".$dato2->id_rol."'>".$dato2->nombre_rol."</option>";
											}
											?>
											</select>
											</div>
											</div>
											
											</div>
											<div class="box-footer">
											<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
											<a class="btn btn-info" href="personarol-read.php" role="button"><i class="fas fa-times"></i> Cancelar</a>
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
											require_once("../controlador/ControladorPersonarol.php");
											ControladorPersonarol::create();
											?>
											
											<?php
											}
											ob_end_flush();
											?>
																						