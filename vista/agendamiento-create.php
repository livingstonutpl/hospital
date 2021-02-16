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
						<h3 class="box-title">Agendar Cita Médica</h3>
					</div>
					
					<form action="#" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="box-body">
							
							<input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Médico:</label>
								<div class="col-sm-10">
									<select name="id_medicoespecialidad1" class="form-control select2" style="width: 100%;" required>
										<option value=''>Médico</option>
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
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Consultar Disponibilidad</button>
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
		
		if(isset($_POST) && !empty($_POST)){
			require_once("../modelo/Agendamiento.php");
		$id_medicoespecialidad1 = Connection::sanitize($_POST["id_medicoespecialidad1"]);
		header ("Location: agendamiento-create2.php?id_medicoespecialidad1=$id_medicoespecialidad1");
		}
		
		?>
		
		<?php
		}
		ob_end_flush();
		?>
				