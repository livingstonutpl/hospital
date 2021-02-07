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
						<h3 class="box-title">Nueva Historial Diagnósticos</h3>
					</div>
					
					<form action="#" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="box-body">
							
							<input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Historial:</label>
								<div class="col-sm-10">
									<select name="id_historiaclinica2" class="form-control select2" style="width: 100%;" required autofocus>
										<option value=''>Historial</option>
										<?php
											require_once("../modelo/Historiaclinica.php");
											$res2 = Historiaclinica::read();
											while ($dato2 = mysqli_fetch_object($res2)){
												echo "<option value='".$dato2->id_historiaclinica."'>".$dato2->cedula_per." - "
												.$dato2->nombre_per." ".$dato2->apellido_per." - "
												.$dato2->fechaatencion_his." - "
												.$dato2->horaatencion_his."</option>";
											}
										?>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Diagnóstico:</label>
								<div class="col-sm-10">
									<select name="id_diagnostico1" class="form-control select2" style="width: 100%;" required>
										<option value=''>Diagnóstico</option>
										<?php
										require_once("../modelo/Diagnostico.php");
										$res2 = Diagnostico::read();
										while ($dato2 = mysqli_fetch_object($res2)){
										echo "<option value='".$dato2->id_diagnostico."'>".$dato2->cie10_dia." - ".$dato2->descripcion_dia."</option>";
										}
										?>
										</select>
										</div>
										</div>
										
										</div>
										<div class="box-footer">
										<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
										<a class="btn btn-info" href="historiaclinicadiagnostico-read.php" role="button"><i class="fas fa-times"></i> Cancelar</a>
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
										require_once("../controlador/ControladorHistoriaclinicadiagnostico.php");
										ControladorHistoriaclinicadiagnostico::create();
										?>
										
										<?php
										}
										ob_end_flush();
										?>
																				