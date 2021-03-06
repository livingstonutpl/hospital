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
						<h3 class="box-title">Asignar Especialidad a Médico</h3>
					</div>
					
					<form action="#" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="box-body">
							
							<input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Médico:</label>
								<div class="col-sm-10">
									<select name="id_medico1" class="form-control select2" style="width: 100%;" required autofocus>
										<option value=''>Médico</option>
										<?php
											require_once("../modelo/Medico.php");
											$res2 = Medico::read();
											while ($dato2 = mysqli_fetch_object($res2)){
												echo "<option value='".$dato2->id_medico."'>".$dato2->cedula_per." - ".$dato2->nombre_per." ".$dato2->apellido_per."</option>";
											}
										?>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Especialidad:</label>
								<div class="col-sm-10">
									<select name="id_especialidad1" class="form-control select2" style="width: 100%;" required>
										<option value=''>Especialidad</option>
										<?php
											require_once("../modelo/Especialidad.php");
											$res2 = Especialidad::read();
											while ($dato2 = mysqli_fetch_object($res2)){
												echo "<option value='".$dato2->id_especialidad."'>".$dato2->nombre_esp."</option>";
											}
										?>
									</select>
								</div>
							</div>							
							
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
							<a class="btn btn-info" href="medicoespecialidad-read.php" role="button"><i class="fas fa-times"></i> Cancelar</a>
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
						require_once("../controlador/ControladorMedicoespecialidad.php");
						ControladorMedicoespecialidad::create();
						?>
						
						<?php
						}
						ob_end_flush();
						?>
												