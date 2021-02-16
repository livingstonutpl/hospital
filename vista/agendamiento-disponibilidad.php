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
						<h3 class="box-title">Crear disponibilidad</h3>
					</div>
					
					<form action="#" name="f1" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="box-body">
							
							<input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Médico Especialidad:</label>
								<div class="col-sm-10">
									<select name="id_medicoespecialidad1" class="form-control select2" style="width: 100%;" required>
										<option value=''>Médico Especialidad</option>
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
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Fecha de Atención:</label>
								<div class="col-sm-10">
									<input type="date" name="fechaatencion_his" class="form-control" min="<?php echo gmdate("Y-m-d",time() + 3600*(-5+date("I"))); ?>" required>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Hora:</label>
								<div class="col-sm-10">
									<div class="checkbox">
										<label><input type="checkbox" name="hora0" value="9:00">9:00</label>
									</div>
									<div class="checkbox">
										<label><input type="checkbox" name="hora1" value="9:30">9:30</label>
									</div>
									<div class="checkbox">
										<label><input type="checkbox" name="hora2" value="10:00">10:00</label>
									</div>
									<div class="checkbox">
										<label><input type="checkbox" name="hora3" value="10:30">10:30</label>
									</div>
									<div class="checkbox">
										<label><input type="checkbox" name="hora4" value="11:00">11:00</label>
									</div>
									<div class="checkbox">
										<label><input type="checkbox" name="hora5" value="11:30">11:30</label>
									</div>
									<div class="checkbox">
										<label><input type="checkbox" name="hora6" value="16:00">16:00</label>
									</div>
									<div class="checkbox">
										<label><input type="checkbox" name="hora7" value="16:30">16:30</label>
									</div>
									<div class="checkbox">
										<label><input type="checkbox" name="hora8" value="17:00">17:00</label>
									</div>
									<div class="checkbox">
										<label><input type="checkbox" name="hora9" value="17:30">17:30</label>
									</div>
									<br>
									<a href="javascript:todo()" class="text-green"><strong>Marcar todos</strong></a> - <a href="javascript:nada()" class="text-red"><strong>Marcar ninguno</strong></a>
								</div>
								
								<input type="hidden" name="estado_his" value="agendado">
								
							</div>
							<div class="box-footer">
								<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
								<a class="btn btn-info" href="agendamiento-read.php" role="button"><i class="fas fa-times"></i> Cancelar</a>
							</div>
						</form> 
					</div>
				</div>
			</section>
		</div>
		
		<?php
			}else{
			require_once("noacceso.php");
		}
		require_once("footer.php");
	?>
	
	<script>
		function todo(){
			for (i=0;i<document.f1.elements.length;i++)
			if(document.f1.elements[i].type == "checkbox")
			document.f1.elements[i].checked=1
		}
		function nada(){
			for (i=0;i<document.f1.elements.length;i++)
			if(document.f1.elements[i].type == "checkbox")
			document.f1.elements[i].checked=0
		} 
	</script>
	
	<?php
		
		if(isset($_POST) && !empty($_POST)){
			require_once("../modelo/Agendamiento.php");				
			$id_medicoespecialidad1 = Connection::sanitize($_POST["id_medicoespecialidad1"]);				
			$fechaatencion_his = Connection::sanitize($_POST["fechaatencion_his"]);
			
			if(isset($_POST["hora0"]) && !empty($_POST["hora0"])){
				$hora0 = Connection::sanitize($_POST["hora0"]);
				$res0 = Agendamiento::create("1", $id_medicoespecialidad1, "", "", "", $fechaatencion_his, $hora0, "disponible", "1-".$fechaatencion_his."-".$hora0, $id_medicoespecialidad1."-".$fechaatencion_his."-".$hora0);
			}
			if(isset($_POST["hora1"]) && !empty($_POST["hora1"])){
				$hora1 = Connection::sanitize($_POST["hora1"]);
				$res1 = Agendamiento::create("1", $id_medicoespecialidad1, "", "", "", $fechaatencion_his, $hora1, "disponible", "1-".$fechaatencion_his."-".$hora1, $id_medicoespecialidad1."-".$fechaatencion_his."-".$hora1);
			}
			if(isset($_POST["hora2"]) && !empty($_POST["hora2"])){
				$hora2 = Connection::sanitize($_POST["hora2"]);
				$res2 = Agendamiento::create("1", $id_medicoespecialidad1, "", "", "", $fechaatencion_his, $hora2, "disponible", "1-".$fechaatencion_his."-".$hora2, $id_medicoespecialidad1."-".$fechaatencion_his."-".$hora2);
			}
			if(isset($_POST["hora3"]) && !empty($_POST["hora3"])){
				$hora3 = Connection::sanitize($_POST["hora3"]);
				$res3 = Agendamiento::create("1", $id_medicoespecialidad1, "", "", "", $fechaatencion_his, $hora3, "disponible", "1-".$fechaatencion_his."-".$hora3, $id_medicoespecialidad1."-".$fechaatencion_his."-".$hora3);
			}
			if(isset($_POST["hora4"]) && !empty($_POST["hora4"])){
				$hora4 = Connection::sanitize($_POST["hora4"]);
				$res4 = Agendamiento::create("1", $id_medicoespecialidad1, "", "", "", $fechaatencion_his, $hora4, "disponible", "1-".$fechaatencion_his."-".$hora4, $id_medicoespecialidad1."-".$fechaatencion_his."-".$hora4);
			}
			if(isset($_POST["hora5"]) && !empty($_POST["hora5"])){
				$hora5 = Connection::sanitize($_POST["hora5"]);
				$res5 = Agendamiento::create("1", $id_medicoespecialidad1, "", "", "", $fechaatencion_his, $hora5, "disponible", "1-".$fechaatencion_his."-".$hora5, $id_medicoespecialidad1."-".$fechaatencion_his."-".$hora5);
			}
			if(isset($_POST["hora6"]) && !empty($_POST["hora6"])){
				$hora6 = Connection::sanitize($_POST["hora6"]);
				$res6 = Agendamiento::create("1", $id_medicoespecialidad1, "", "", "", $fechaatencion_his, $hora6, "disponible", "1-".$fechaatencion_his."-".$hora6, $id_medicoespecialidad1."-".$fechaatencion_his."-".$hora6);
			}
			if(isset($_POST["hora7"]) && !empty($_POST["hora7"])){
				$hora7 = Connection::sanitize($_POST["hora7"]);
				$res7 = Agendamiento::create("1", $id_medicoespecialidad1, "", "", "", $fechaatencion_his, $hora7, "disponible", "1-".$fechaatencion_his."-".$hora7, $id_medicoespecialidad1."-".$fechaatencion_his."-".$hora7);
			}
			if(isset($_POST["hora8"]) && !empty($_POST["hora8"])){
				$hora8 = Connection::sanitize($_POST["hora8"]);
				$res8 = Agendamiento::create("1", $id_medicoespecialidad1, "", "", "", $fechaatencion_his, $hora8, "disponible", "1-".$fechaatencion_his."-".$hora8, $id_medicoespecialidad1."-".$fechaatencion_his."-".$hora8);
			}
			if(isset($_POST["hora9"]) && !empty($_POST["hora9"])){
				$hora9 = Connection::sanitize($_POST["hora9"]);
				$res9 = Agendamiento::create("1", $id_medicoespecialidad1, "", "", "", $fechaatencion_his, $hora9, "disponible", "1-".$fechaatencion_his."-".$hora9, $id_medicoespecialidad1."-".$fechaatencion_his."-".$hora9);
			}
			
			if($res0 or $res1 or $res2 or $res3 or $res4 or $res5 or $res6 or $res7 or $res8 or $res9){
				$msg = base64_encode("<script>toastr.success('Disponibilidad creada correctamente');</script>");
				}else{
				$msg = base64_encode("<script>toastr.error('Error al crear la disponibilidad');</script>");
			}
			header ("Location: agendamiento-read.php?msg=$msg");
		}
		
	?>
	
	<?php
	}
	ob_end_flush();
?>
