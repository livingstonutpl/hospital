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
						<h3 class="box-title">Actualizar Historia Cl&iacute;nica</h3>
					</div>
					
					<!-- <?php
						if(isset($_GET["id_historiaclinica"]) && !empty($_GET["id_historiaclinica"])){
							require_once("../modelo/Historiaclinica.php");
							$id_historiaclinica = Connection::sanitize($_GET["id_historiaclinica"]);
							$res = historiaclinica::single_row($id_historiaclinica);
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
									<?php
										require_once("../modelo/Persona.php");
										$res2 = Persona::read();
										while ($dato2 = mysqli_fetch_object($res2)){
											if ($res->id_persona3 == $dato2->id_persona){
												$id_persona3 = $dato2->cedula_per." - ".$dato2->nombre_per." ".$dato2->apellido_per;
											}
										}
									?>
									<input type="text" name="id_persona3" value="<?php echo $id_persona3;?>" class="form-control" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Médico:</label>
								<div class="col-sm-10">
									<?php
										require_once("../modelo/MedicoEspecialidad.php");
										$res2 = MedicoEspecialidad::read();
										while ($dato2 = mysqli_fetch_object($res2)){
											if ($res->id_medicoespecialidad1 == $dato2->id_medicoespecialidad){
												$id_medicoespecialidad1 = $dato2->nombre_per." ".$dato2->apellido_per." - ".$dato2->nombre_esp;
											}
										}
									?>
									<input type="text" name="id_medicoespecialidad1" value="<?php echo $id_medicoespecialidad1;?>" class="form-control" readonly>
								</div>
							</div>
							
							<!-- <div class="form-group">
								<label class="col-sm-2 control-label">Paciente:</label>
								<div class="col-sm-10">
								<select name="id_persona3" class="form-control select2" style="width: 100%;" required>
								<option value=''>Paciente</option>
								<?php
									// require_once("../modelo/Persona.php");
									// $res2 = Persona::read();
									// while ($dato2 = mysqli_fetch_object($res2)){ 
									// $selected = ($res->id_persona3 == $dato2->id_persona) ? "selected" : "" ;
									// echo "<option ".$selected." value='".$dato2->id_persona."'>".$dato2->cedula_per." - ".$dato2->nombre_per." ".$dato2->apellido_per."</option>";
									// }
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
									// if ($res->id_medicoespecialidad1 == $dato2->id_medicoespecialidad){
									// $id_medicoespecialidad1 = $dato2->nombre_per." ".$dato2->apellido_per." - ".$dato2->nombre_esp;
									// }
									// require_once("../modelo/MedicoEspecialidad.php");
									// $res2 = MedicoEspecialidad::read();
									// while ($dato2 = mysqli_fetch_object($res2)){ 
									// $selected = ($res->id_medicoespecialidad1 == $dato2->id_medicoespecialidad) ? "selected" : "" ;
									// echo "<option ".$selected." value='".$dato2->id_medicoespecialidad."'>".$dato2->nombre_per." ".$dato2->apellido_per." - ".$dato2->nombre_esp."</option>";
									// }
								?>
								</select>
								</div>
							</div> -->
							
							<div class="form-group">
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
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Fecha de Atención:</label>
								<div class="col-sm-10">
									<input type="date" name="fechaatencion_his" value="<?php echo $res->fechaatencion_his;?>" class="form-control" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Hora de Atención:</label>
								<div class="col-sm-10">
									<input type="time" name="horaatencion_his" value="<?php echo $res->horaatencion_his;?>" class="form-control" readonly>
								</div>
							</div>
							
							<div class="form-group">
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
							</div>
							
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-success"><i class="fas fa-sync-alt"></i> Actualizar</button>
							<a class="btn btn-info" href="historiaclinica-read.php" role="button"><i class="fas fa-times"></i> Cancelar</a>
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
		require_once("../controlador/ControladorHistoriaclinica.php");
		ControladorHistoriaclinica::update();
	?>
	
	<?php
	}
	ob_end_flush();
?>
