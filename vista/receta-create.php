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
						<h3 class="box-title">Nueva Receta</h3>
					</div>
					
					<!-- <?php
						if(isset($_GET["id_historiaclinica"]) and !empty($_GET["id_historiaclinica"])){
							require_once("../modelo/Historiaclinica.php");
							$id_historiaclinica = Connection::sanitize($_GET["id_historiaclinica"]);
							$res = historiaclinica::single_row($id_historiaclinica);
						}
					?> -->
					
					
					<form action="#" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="box-body">
							
							<input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">
							
							<!-- ***************************** -->
							<!-- ***************************** -->
							<!-- ***************************** -->
							
							<input type="hidden" name="id_historiaclinica1" value="<?php echo $res->id_historiaclinica;?>">
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Cédula:</label>
								<div class="col-sm-10">
									<?php
										require_once("../modelo/Persona.php");
										$res2 = Persona::read();
										while ($dato2 = mysqli_fetch_object($res2)){
											if ($res->id_persona3 == $dato2->id_persona){
												$id_persona3 = $dato2->cedula_per;
											}
										}
									?>
									<input type="text" name="id_persona3" value="<?php echo $id_persona3;?>" class="form-control" readonly>
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
												$id_persona3 = $dato2->nombre_per." ".$dato2->apellido_per;
											}
										}
									?>
									<input type="text" name="id_persona3" value="<?php echo $id_persona3;?>" class="form-control" readonly>
								</div>
							</div>
							<!-- ***************************** -->
							<!-- ***************************** -->
							<!-- ***************************** -->
							
							<!-- <div class="form-group">
								<label class="col-sm-2 control-label">Historial:</label>
								<div class="col-sm-10">
								<select name="id_historiaclinica1" class="form-control select2" style="width: 100%;" required autofocus>
								<option value=''>Historial</option>
								<?php
									// require_once("../modelo/Historiaclinica.php");
									// $res2 = Historiaclinica::read();
									// while ($dato2 = mysqli_fetch_object($res2)){	
									// echo "<option value='".$dato2->id_historiaclinica."'>"
									// .$dato2->cedula_per." - "
									// .$dato2->nombre_per." ".$dato2->apellido_per." - "
									// .$dato2->fechaatencion_his." - "
									// .$dato2->horaatencion_his."</option>";
									// }
								?>
								</select>
								</div>
							</div> -->
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Fecha:</label>
								<div class="col-sm-10">
									<input type="date" name="fecha_rec" class="form-control" min="<?php echo gmdate("Y-m-d",time() + 3600*(-5+date("I"))); ?>" required>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Hora:</label>
								<div class="col-sm-10">
									<input type="time" name="hora_rec" class="form-control" required>
								</div>
							</div>
							
							<!-- <div class="form-group">
								<label class="col-sm-2 control-label">Hora:</label>
								<div class="col-sm-10">
								<select name="hora_rec" class="form-control select2" style="width: 100%;" required>
								<option value=''>Hora</option>
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
							</div> -->
							
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
						if(isset($_POST) && !empty($_POST)){
						if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
						require_once("../modelo/Receta.php");
						$id_historiaclinica1 = Connection::sanitize($_POST["id_historiaclinica1"]);
						$fecha_rec = Connection::sanitize($_POST["fecha_rec"]);
						$hora_rec = Connection::sanitize($_POST["hora_rec"]);
						$estado_rec = Connection::sanitize($_POST["estado_rec"]);
						$res = Receta::create($id_historiaclinica1, $fecha_rec, $hora_rec, $estado_rec);
						if($res){
						$msg = base64_encode("<script>toastr.success('Registro guardado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('Registro duplicado');</script>");
						}
						header ("Location: historiaclinica-read.php?msg=$msg");
						}else{
						echo "<script>toastr.error('El registro no se pudo guardar');</script>";
						}
						}
						?>
						
						<?php
						}
						ob_end_flush();
						?>
												