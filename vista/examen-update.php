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
						<h3 class="box-title">Actualizar Examen</h3>
					</div>
					
					<!-- <?php
						if(isset($_GET["id_examen"]) && !empty($_GET["id_examen"])){
							require_once("../modelo/Examen.php");
							$id_examen = Connection::sanitize($_GET["id_examen"]);
							$res = examen::single_row($id_examen);
						}
					?> -->
					
					<form action="#" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="box-body">
							
							<input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Id:</label>
								<div class="col-sm-10">
									<input type="text" name="id_examen" value="<?php echo $res->id_examen;?>" class="form-control" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Historia Clínica:</label>
								<div class="col-sm-10">
									<select name="id_historiaclinica3" class="form-control select2" style="width: 100%;" required autofocus>
										<option value=''>Historia Clínica</option>
										<?php
											require_once("../modelo/Historiaclinica.php");
											$res2 = Historiaclinica::read();
											while ($dato2 = mysqli_fetch_object($res2)){ 
												$selected = ($res->id_historiaclinica3 == $dato2->id_historiaclinica) ? "selected" : "" ;
												echo "<option ".$selected." value='".$dato2->id_historiaclinica."'>".
												$dato2->cedula_per." - "
												.$dato2->nombre_per." ".$dato2->apellido_per." - "
												.$dato2->fechaatencion_his." - "
												.$dato2->horaatencion_his."</option>";
											}
										?>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Fecha Examen:</label>
								<div class="col-sm-10">
									<input type="date" name="fecha_exa" min="<?php echo gmdate("Y-m-d",time() + 3600*(-5+date("I"))); ?>" value="<?php echo $res->fecha_exa;?>" class="form-control" required>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Hora Examen:</label>
								<div class="col-sm-10">
									<select name="hora_exa" class="form-control select2" style="width: 100%;" required>
										<option value=''>Hora</option>
										<option <?php if($res->hora_exa == "09:00"){ echo "selected"; } ?> value="09:00">09:00</option>
										<option <?php if($res->hora_exa == "09:30"){ echo "selected"; } ?> value="09:30">09:30</option>
										<option <?php if($res->hora_exa == "10:00"){ echo "selected"; } ?> value="10:00">10:00</option>
										<option <?php if($res->hora_exa == "10:30"){ echo "selected"; } ?> value="10:30">10:30</option>
										<option <?php if($res->hora_exa == "11:00"){ echo "selected"; } ?> value="11:00">11:00</option>
										<option <?php if($res->hora_exa == "11:30"){ echo "selected"; } ?> value="11:30">11:30</option>
										<option <?php if($res->hora_exa == "16:00"){ echo "selected"; } ?> value="16:00">16:00</option>
										<option <?php if($res->hora_exa == "16:30"){ echo "selected"; } ?> value="16:30">16:30</option>
										<option <?php if($res->hora_exa == "17:00"){ echo "selected"; } ?> value="17:00">17:00</option>
										<option <?php if($res->hora_exa == "17:30"){ echo "selected"; } ?> value="17:30">17:30</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Tipo:</label>
								<div class="col-sm-10">
									<select name="tipo_exa" class="form-control select2" style="width: 100%;" required>
										<option value=''>Tipo</option>
										<option <?php if($res->tipo_exa == "Colonoscopía"){ echo "selected"; } ?> value="Colonoscopía">Colonoscopía</option>
										<option <?php if($res->tipo_exa == "Colposcopía"){ echo "selected"; } ?> value="Colposcopía">Colposcopía</option>
										<option <?php if($res->tipo_exa == "Ecocardiograma"){ echo "selected"; } ?> value="Ecocardiograma">Ecocardiograma</option>
										<option <?php if($res->tipo_exa == "Ecografía"){ echo "selected"; } ?> value="Ecografía">Ecografía</option>
										<option <?php if($res->tipo_exa == "Electrocardiograma"){ echo "selected"; } ?> value="Electrocardiograma">Electrocardiograma</option>
										<option <?php if($res->tipo_exa == "Electroencefalograma"){ echo "selected"; } ?> value="Electroencefalograma">Electroencefalograma</option>
										<option <?php if($res->tipo_exa == "Endoscopía"){ echo "selected"; } ?> value="Endoscopía">Endoscopía</option>
										<option <?php if($res->tipo_exa == "Imagen"){ echo "selected"; } ?> value="Imagen">Imagen</option>
										<option <?php if($res->tipo_exa == "Laboratorio"){ echo "selected"; } ?> value="Laboratorio">Laboratorio</option>
										<option <?php if($res->tipo_exa == "Mamografía"){ echo "selected"; } ?> value="Mamografía">Mamografía</option>
										<option <?php if($res->tipo_exa == "Tomografía"){ echo "selected"; } ?> value="Tomografía">Tomografía</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Descripción:</label>
								<div class="col-sm-10">
									<textarea rows="3" name="descripcion_exa" class="form-control" required><?php echo $res->descripcion_exa;?></textarea>
								</div>
							</div>
							
							<div class="form-group">
							<label class="col-sm-2 control-label">Resultado:</label>
							<div class="col-sm-10">
							<textarea rows="3" name="resultado_exa" class="form-control" required><?php echo $res->resultado_exa;?></textarea>
							</div>
							</div>
							
							<div class="form-group">
							<label class="col-sm-2 control-label">Estado:</label>
							<div class="col-sm-10">
							<div class="radio">
							<label><input <?php if($res->estado_exa == "pendiente"){ echo "checked"; } ?> type="radio" name="estado_exa" value="pendiente" required>pendiente</label>
							</div>
							<div class="radio">
							<label><input <?php if($res->estado_exa == "elaborado"){ echo "checked"; } ?> type="radio" name="estado_exa" value="elaborado" required>elaborado</label>
							</div>
							<div class="radio">
							<label><input <?php if($res->estado_exa == "anulado"){ echo "checked"; } ?> type="radio" name="estado_exa" value="anulado" required>anulado</label>
							</div>
							</div>
							</div>
							
							</div>
							<div class="box-footer">
							<button type="submit" class="btn btn-success"><i class="fas fa-sync-alt"></i> Actualizar</button>
							<a class="btn btn-info" href="examen-read.php" role="button"><i class="fas fa-times"></i> Cancelar</a>
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
							require_once("../controlador/ControladorExamen.php");
							ControladorExamen::update();
							?>
							
							<?php
							}
							ob_end_flush();
							?>
														