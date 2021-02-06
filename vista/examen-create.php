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
						<h3 class="box-title">Nuevo Examen</h3>
					</div>
					
					<form action="#" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="box-body">
							
							<input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Historia Clínica:</label>
								<div class="col-sm-10">
									<select name="id_historiaclinica3" class="form-control select2" style="width: 100%;" required autofocus>
										<option value=''>Historia Clínica</option>
										<?php
											require_once("../modelo/Historiaclinica.php");
											$res2 = Historiaclinica::read();
											while ($dato2 = mysqli_fetch_object($res2)){	
												echo "<option value='".$dato2->id_historiaclinica."'>"
												.$dato2->cedula_per." - "
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
									<input type="date" name="fecha_exa" class="form-control" min="<?php echo gmdate("Y-m-d",time() + 3600*(-5+date("I"))); ?>" required>
								</div>
							</div>							
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Hora Examen:</label>
								<div class="col-sm-10">
									<select name="hora_exa" class="form-control select2" style="width: 100%;" required>
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
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Tipo:</label>
								<div class="col-sm-10">
									<select name="tipo_exa" class="form-control select2" style="width: 100%;" required>
										<option value=''>Tipo</option>
										<option value='Colonoscopía'>Colonoscopía</option>
										<option value='Colposcopía'>Colposcopía</option>
										<option value='Ecocardiograma'>Ecocardiograma</option>
										<option value='Ecografía'>Ecografía</option>
										<option value='Electrocardiograma'>Electrocardiograma</option>
										<option value='Electroencefalograma'>Electroencefalograma</option>
										<option value='Endoscopía'>Endoscopía</option>
										<option value='Imagen'>Imagen</option>
										<option value='Laboratorio'>Laboratorio</option>
										<option value='Mamografía'>Mamografía</option>
										<option value='Tomografía'>Tomografía</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Descripción:</label>
								<div class="col-sm-10">
									<textarea rows="3" name="descripcion_exa" class="form-control" placeholder="Descripción" required></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Resultado:</label>
								<div class="col-sm-10">
									<textarea rows="3" name="resultado_exa" class="form-control" placeholder="Resultado" required></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Estado:</label>
								<div class="col-sm-10">
									<div class="radio">
										<label><input type="radio" name="estado_exa" value="pendiente" required>pendiente</label>
									</div>
									<div class="radio">
										<label><input type="radio" name="estado_exa" value="elaborado" required>elaborado</label>
									</div>
									<div class="radio">
										<label><input type="radio" name="estado_exa" value="anulado" required>anulado</label>
									</div>
								</div>
							</div>
							
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
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
		ControladorExamen::create();
	?>
	
	<?php
	}
	ob_end_flush();
?>
