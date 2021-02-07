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
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Actualizar M&eacute;dico Especialidades</h3>
					</div>
					
					<!-- <?php
						if(isset($_GET["id_medicoespecialidad"]) and !empty($_GET["id_medicoespecialidad"])){
							require_once("../modelo/Medicoespecialidad.php");
							$id_medicoespecialidad = Connection::sanitize($_GET["id_medicoespecialidad"]);
							$res = medicoespecialidad::single_row($id_medicoespecialidad);
						}
					?> -->
					
					<form action="#" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="box-body">
							
							<input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Id:</label>
								<div class="col-sm-10">
									<input type="text" name="id_medicoespecialidad" value="<?php echo $res->id_medicoespecialidad;?>" class="form-control" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Médico:</label>
								<div class="col-sm-10">
									<select name="id_medico1" class="form-control select2" style="width: 100%;" required autofocus>
										<option value=''>Medico</option>
										<?php
											require_once("../modelo/Medico.php");
											$res2 = Medico::read();
											while ($dato2 = mysqli_fetch_object($res2)){ 
												$selected = ($res->id_medico1 == $dato2->id_medico) ? "selected" : "" ;
												echo "<option ".$selected." value='".$dato2->id_medico."'>".$dato2->id_medico." - ".$dato2->cedula_per." - ".$dato2->nombre_per." ".$dato2->apellido_per."</option>";
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
												$selected = ($res->id_especialidad1 == $dato2->id_especialidad) ? "selected" : "" ;
												echo "<option ".$selected." value='".$dato2->id_especialidad."'>".$dato2->id_especialidad." - ".$dato2->nombre_esp."</option>";
											}
										?>
									</select>
								</div>
							</div>
							
							</div>
							<div class="box-footer">
							<button type="submit" class="btn btn-success"><i class="fas fa-sync-alt"></i> Actualizar</button>
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
							ControladorMedicoespecialidad::update();
							?>
							
							<?php
							}
							ob_end_flush();
							?>
														