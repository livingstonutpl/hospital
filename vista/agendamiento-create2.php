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
					
					<!-- <?php
						if(isset($_GET["id_medicoespecialidad1"]) and !empty($_GET["id_medicoespecialidad1"])){
							require_once("../modelo/Agendamiento.php");
							$id_medicoespecialidad1 = Connection::sanitize($_GET["id_medicoespecialidad1"]);
							$res = Agendamiento::disponibilidad($id_medicoespecialidad1);
							$id_medesp = $id_medicoespecialidad1;
						}
					?> -->
					
					<form action="#" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="box-body">
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Médico:</label>
								<div class="col-sm-10">
									<?php
										require_once("../modelo/MedicoEspecialidad.php");
										$res2 = MedicoEspecialidad::read();
										while ($dato2 = mysqli_fetch_object($res2)){
											if ($id_medicoespecialidad1 == $dato2->id_medicoespecialidad){
												$id_medicoespecialidad1 = $dato2->nombre_per." ".$dato2->apellido_per." - ".$dato2->nombre_esp;
											}
										}
									?>
									<input type="text" name="id_medicoespecialidad1" value="<?php echo $id_medicoespecialidad1;?>" class="form-control" readonly>
								</div>
							</div>
							
							<input type="hidden" name="id_medesp" value="<?php echo $id_medesp;?>">
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Disponibilidad:</label>
								<div class="col-sm-10">
									<select name="fechahora" class="form-control select2" style="width: 100%;" required>
										<option value=''>Disponibilidad</option>
										<?php
											while ($dato2 = mysqli_fetch_object($res)){
												echo "<option value='".$dato2->fechaatencion_his."@".$dato2->horaatencion_his."'>".$dato2->fechaatencion_his." - ".$dato2->horaatencion_his."</option>";
											}
										?>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Paciente:</label>
								<div class="col-sm-10">
									<select name="id_persona" class="form-control select2" style="width: 100%;" required autofocus>
										<option value=''>Paciente</option>
										<?php
											if ($_SESSION["rol"] == "administrador"){
												require_once("../modelo/Persona.php");
												$res2 = Persona::read();
											}
											
											if ($_SESSION["rol"] == "cliente"){
												require_once("../modelo/Persona.php");
												$res2 = Persona::readagendamiento($_SESSION["id_usuario1"]);
											}
											
											while ($dato2 = mysqli_fetch_object($res2)){
												echo "<option value='".$dato2->id_persona."'>".$dato2->cedula_per." - ".$dato2->nombre_per." ".$dato2->apellido_per."</option>";
											}
										?>
									</select>
								</div>
							</div>
							
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Agendar Cita Médica</button> 
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
			// $id_medicoespecialidad1 = Connection::sanitize($_POST["id_medicoespecialidad1"]);
			$id_persona = Connection::sanitize($_POST["id_persona"]);
			$id_medesp = Connection::sanitize($_POST["id_medesp"]);
			$fechahora = Connection::sanitize($_POST["fechahora"]);
			$fecha = substr($fechahora, 0, 10);
			$hora = substr($fechahora, 11, 10);
			$estado = "agendado";
			$verificador_his = $id_persona."-".$fecha."-".$hora;
			$verificador2_his = $id_medesp."-".$fecha."-".$hora;
			
			// PRUEBA DE IMPRESION
			// echo "id_persona: ".$id_persona."<br>";
			// echo "id_medesp: ".$id_medesp."<br>";
			// echo "fecha: ".$fecha."<br>";
			// echo "hora: ".$hora."<br>";
			// echo "estado: ".$estado."<br>";
			// echo "verificador_his: ".$verificador_his."<br>";
			// echo "verificador2_his: ".$verificador2_his."<br>";
			
			$res = Agendamiento::updatecita($id_persona, $id_medesp, $fecha, $hora, $estado, $verificador_his, $verificador2_his);
			if($res){
				$msg = base64_encode("<script>toastr.success('Cita Médica agendada correctamente');</script>");
				}else{
				$msg = base64_encode("<script>toastr.error('Cita no agendada');</script>");
			}
			header ("Location: agendamiento-read.php?msg=$msg");
			
		}
		
	?>
	
	<?php
	}
	ob_end_flush();
?>
