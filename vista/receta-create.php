<?php
	ob_start();
	session_start();
	if (!isset($_SESSION["sesion"])){
		header("Location: login.php");
		}else{
		require_once("header.php");
		if ($_SESSION["rol"] == "administrador" or $_SESSION["rol"] == "cliente"){
		?>
		
		<div class="content-wrapper">
			<section class="content">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Nueva Receta</h3>
					</div>
					
					<form action="#" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="box-body">
							
							<input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Historia Clínica:</label>
								<div class="col-sm-10">
									<select name="id_historiaclinica1" class="form-control select2" style="width: 100%;" required autofocus>
										<option value=''>Historia Clínica</option>
										<?php
											require_once("../modelo/Historiaclinica.php");
											$res2 = Historiaclinica::read();
											while ($dato2 = mysqli_fetch_object($res2)){
												echo "<option value='".$dato2->id_historiaclinica."'>".$dato2->id_historiaclinica." - ".$dato2->fechaatencion_his."</option>";
											}
										?>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Fecha:</label>
								<div class="col-sm-10">
									<input type="date" name="fecha_rec" class="form-control" required>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Hora:</label>
							<div class="col-sm-10">
							<input type="time" name="hora_rec" class="form-control" required>
							</div>
							</div>
							
							<div class="form-group">
							<label class="col-sm-2 control-label">Estado:</label>
							<div class="col-sm-10">
							<div class="radio">
							<label><input type="radio" name="estado_rec" value="pendiente">pendiente</label>
							</div>
							<div class="radio">
							<label><input type="radio" name="estado_rec" value="entregado">entregado</label>
							</div>
							<div class="radio">
							<label><input type="radio" name="estado_rec" value="anulado">anulado</label>
							</div>
							</div>
							</div>
							
							</div>
							<div class="box-footer">
							<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
							<a class="btn btn-info" href="receta-read.php" role="button"><i class="fas fa-times"></i> Cancelar</a>
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
							require_once("../controlador/ControladorReceta.php");
							ControladorReceta::create();
							?>
							
							<?php
							}
							ob_end_flush();
							?>
														