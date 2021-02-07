<?php
	ob_start();
	session_start();
	if (!isset($_SESSION["sesion"])){
		header("Location: login.php");
		}else{
		require_once("header.php");
		if ($_SESSION["rol"] == "administrador" or $_SESSION["rol"] == "medico" or $_SESSION["rol"] == "cliente"){
		?>
		
		<div class="content-wrapper">
			<section class="content">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Nueva Cita Médica</h3>
					</div>
					
					<form action="#" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="box-body">
							
							<input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Paciente:</label>
								<div class="col-sm-10">
									<select name="id_persona3" class="form-control select2" style="width: 100%;" required autofocus>
										<option value=''>Paciente</option>
										<?php
											if ($_SESSION["rol"] == "cliente"){
												require_once("../modelo/Persona.php");
												$res2 = Persona::read3($_SESSION["id_usuario1"]);
											}
											if ($_SESSION["rol"] == "administrador"){
												require_once("../modelo/Persona.php");
												$res2 = Persona::read();
											}
											if ($_SESSION["rol"] == "medico"){
												require_once("../modelo/Persona.php");
												$res2 = Persona::read();
											}
											
											while ($dato2 = mysqli_fetch_object($res2)){
												echo "<option value='".$dato2->id_persona."'>".$dato2->cedula_per." - ".$dato2->nombre_per." ".$dato2->apellido_per."</option>";
											}
										?>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Médico Especialidad:</label>
								<div class="col-sm-10">
									<select name="id_medicoespecialidad1" class="form-control select2" style="width: 100%;" required>
										<option value=''>Médico Especialidad</option>
										<?php
											require_once("../modelo/MedicoEspecialidad.php");
											$res2 = MedicoEspecialidad::read();
											while ($dato2 = mysqli_fetch_object($res2)){
												echo "<option value='".$dato2->id_medicoespecialidad."'>".$dato2->nombre_per." ".$dato2->apellido_per." - ".$dato2->nombre_esp."</option>";
											}
										?>
									</select>
								</div>
							</div>
							
							<!-- <div class="form-group">
								<label class="col-sm-2 control-label">Anamnesis:</label>
								<div class="col-sm-10">
								<textarea rows="3" name="anamnesis_his" class="form-control" placeholder="Anamnesis" required></textarea>
								</div>
								</div>
								
								<div class="form-group">
								<label class="col-sm-2 control-label">Examen Físico:</label>
								<div class="col-sm-10">
								<textarea rows="3" name="examenfisico_his" class="form-control" placeholder="Examen Físico" required></textarea>
							</div>
							</div>
							
							<div class="form-group">
							<label class="col-sm-2 control-label">Tratamiento:</label>
							<div class="col-sm-10">
							<textarea rows="3" name="tratamiento_his" class="form-control" placeholder="Tratamiento" required></textarea>
							</div>
							</div> -->
							
							<div class="form-group">
							<label class="col-sm-2 control-label">Fecha de Atención:</label>
							<div class="col-sm-10">
							<input type="date" name="fechaatencion_his" class="form-control" min="<?php echo gmdate("Y-m-d",time() + 3600*(-5+date("I"))); ?>" required>
							</div>
							</div>
							
							<div class="form-group">
							<label class="col-sm-2 control-label">Hora de Atención:</label>
							<div class="col-sm-10">
							<select name="horaatencion_his" class="form-control select2" style="width: 100%;" required>
							<option value=''>Hora de Atención</option>
							<option value='09:00'>09:00</option>
							<option value='09:30'>09:30</option>
							<option value='10:00'>10:00</option>
							<option value='10:30'>10:30</option>
							<option value='11:00'>11:00</option>
							<option value='11:30'>11:30</option>
							<option value='16:00'>16:00</option>
							<option value='16:30'>16:30</option>
							<option value='17:00'>17:00</option>
							<option value='17:30'>17:30</option>
							</select>
							</div>
							</div>
							
							<!-- <div class="form-group">
							<label class="col-sm-2 control-label">Hora de Atención:</label>
							<div class="col-sm-10">
							<input type="time" name="horaatencion_his" class="form-control" required>
							</div>
							</div> -->
							
							<input type="hidden" name="estado_his" value="agendado">
							
							</div>
							<div class="box-footer">
							<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
							<a class="btn btn-info" href="agendamiento-read.php" role="button"><i class="fas fa-times"></i> Cancelar</a>
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
							require_once("../controlador/ControladorAgendamiento.php");
							ControladorAgendamiento::create();
							?>
							
							<?php
							}
							ob_end_flush();
							?>
														