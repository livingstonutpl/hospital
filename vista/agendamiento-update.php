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
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Actualizar Cita Médica</h3>
					</div>
					
					<!-- <?php
						if(isset($_GET["id_historiaclinica"]) and !empty($_GET["id_historiaclinica"])){
							require_once("../modelo/Agendamiento.php");
							$id_historiaclinica = Connection::sanitize($_GET["id_historiaclinica"]);
							$res = Agendamiento::single_row($id_historiaclinica);
						}
					?> -->
					
					<form action="#" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="box-body">
							
							<input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Id:</label>
								<div class="col-sm-10">
									<input type="text" name="id_historiaclinica" value="<?php echo $res->id_historiaclinica;?>" class="form-control" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Paciente:</label>
								<div class="col-sm-10">
									<select name="id_persona3" class="form-control select2" style="width: 100%;" required autofocus>
										<option value=''>Paciente</option>
										<?php
											require_once("../modelo/Persona.php");
											$res2 = Persona::read3($_SESSION["id_usuario1"]);
											while ($dato2 = mysqli_fetch_object($res2)){ 
												$selected = ($res->id_persona3 == $dato2->id_persona) ? "selected" : "" ;
												echo "<option ".$selected." value='".$dato2->id_persona."'>".$dato2->cedula_per." - ".$dato2->nombre_per." ".$dato2->apellido_per."</option>";
											}
										?>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Médico:</label>
								<div class="col-sm-10">
									<select name="id_medicoespecialidad1" class="form-control select2" style="width: 100%;" required>
										<option value=''>Médico</option>
									<?php
									if ($res->id_medicoespecialidad1 == $dato2->id_medicoespecialidad){
									$id_medicoespecialidad1 = $dato2->nombre_per." ".$dato2->apellido_per." - ".$dato2->nombre_esp;
									}
									require_once("../modelo/MedicoEspecialidad.php");
									$res2 = MedicoEspecialidad::read();
									while ($dato2 = mysqli_fetch_object($res2)){ 
									$selected = ($res->id_medicoespecialidad1 == $dato2->id_medicoespecialidad) ? "selected" : "" ;
									echo "<option ".$selected." value='".$dato2->id_medicoespecialidad."'>".$dato2->nombre_per." ".$dato2->apellido_per." - ".$dato2->nombre_esp."</option>";
									}
									?>
									</select>
									</div>
									</div>
									
									<!-- <div class="form-group">
									<label class="col-sm-2 control-label">Anamnesis:</label>
									<div class="col-sm-10">
									<textarea rows="3" name="anamnesis_his" class="form-control" required><?php echo $res->anamnesis_his;?></textarea>
									</div>
									</div>
									
									<div class="form-group">
									<label class="col-sm-2 control-label">Examen Físico:</label>
									<div class="col-sm-10">
									<textarea rows="3" name="examenfisico_his" class="form-control" required><?php echo $res->examenfisico_his;?></textarea>
									</div>
									</div>
									
									<div class="form-group">
									<label class="col-sm-2 control-label">Tratamiento:</label>
									<div class="col-sm-10">
									<textarea rows="3" name="tratamiento_his" class="form-control" required><?php echo $res->tratamiento_his;?></textarea>
									</div>
									</div> -->
									
									<div class="form-group">
									<label class="col-sm-2 control-label">Fecha de Atención:</label>
									<div class="col-sm-10">
									<input type="date" name="fechaatencion_his" min="<?php echo gmdate("Y-m-d",time() + 3600*(-5+date("I"))); ?>" value="<?php echo $res->fechaatencion_his;?>" class="form-control" required>
									</div>
									</div>
									
									<div class="form-group">
									<label class="col-sm-2 control-label">Hora de Atención:</label>
									<div class="col-sm-10">
									<select name="horaatencion_his" class="form-control select2" style="width: 100%;" required>
									<option value=''>Hora</option>
									<option <?php if($res->horaatencion_his == "09:00"){ echo "selected"; } ?> value="09:00">09:00</option>
									<option <?php if($res->horaatencion_his == "09:30"){ echo "selected"; } ?> value="09:30">09:30</option>
									<option <?php if($res->horaatencion_his == "10:00"){ echo "selected"; } ?> value="10:00">10:00</option>
									<option <?php if($res->horaatencion_his == "10:30"){ echo "selected"; } ?> value="10:30">10:30</option>
									<option <?php if($res->horaatencion_his == "11:00"){ echo "selected"; } ?> value="11:00">11:00</option>
									<option <?php if($res->horaatencion_his == "11:30"){ echo "selected"; } ?> value="11:30">11:30</option>
									<option <?php if($res->horaatencion_his == "16:00"){ echo "selected"; } ?> value="16:00">16:00</option>
									<option <?php if($res->horaatencion_his == "16:30"){ echo "selected"; } ?> value="16:30">16:30</option>
									<option <?php if($res->horaatencion_his == "17:00"){ echo "selected"; } ?> value="17:00">17:00</option>
									<option <?php if($res->horaatencion_his == "17:30"){ echo "selected"; } ?> value="17:30">17:30</option>
									</select>
									</div>
									</div>
									
									
									<input type="hidden" name="estado_his" value="agendado">
									
									<!-- <div class="form-group">
									<label class="col-sm-2 control-label">Estado:</label>
									<div class="col-sm-10">
									<div class="radio">
									<label><input <?php if($res->estado_his == "agendado"){ echo "checked"; } ?> type="radio" name="estado_his" value="agendado" required>agendado</label>
									</div>
									<div class="radio">
									<label><input <?php if($res->estado_his == "atendido"){ echo "checked"; } ?> type="radio" name="estado_his" value="atendido" required>atendido</label>
									</div>
									<div class="radio">
									<label><input <?php if($res->estado_his == "ausente"){ echo "checked"; } ?> type="radio" name="estado_his" value="ausente" required>ausente</label>
									</div>
									</div>
									</div> -->
									
									</div>
									<div class="box-footer">
									<button type="submit" class="btn btn-success"><i class="fas fa-sync-alt"></i> Actualizar</button>
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
									ControladorAgendamiento::update();
									?>
									
									<?php
									}
									ob_end_flush();
									?>
																		