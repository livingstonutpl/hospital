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
						<h3 class="box-title">Nuevo Diagnóstico</h3>
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
							<input type="hidden" name="id_historiaclinica2" value="<?php echo $res->id_historiaclinica;?>" class="form-control" readonly>
							
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
									<select name="id_historiaclinica2" class="form-control select2" style="width: 100%;" required autofocus>
									<option value=''>Historial</option>
									<?php
									// require_once("../modelo/Historiaclinica.php");
									// $res2 = Historiaclinica::read();
									// while ($dato2 = mysqli_fetch_object($res2)){
									// echo "<option value='".$dato2->id_historiaclinica."'>".$dato2->cedula_per." - "
									// .$dato2->nombre_per." ".$dato2->apellido_per." - "
									// .$dato2->fechaatencion_his." - "
									// .$dato2->horaatencion_his."</option>";
									// }
									?>
									</select>
									</div>
									</div> -->
									
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
									require_once("../modelo/Historiaclinicadiagnostico.php");
									$id_historiaclinica2 = Connection::sanitize($_POST["id_historiaclinica2"]);
									$id_diagnostico1 = Connection::sanitize($_POST["id_diagnostico1"]);
									$verificador_hisclidia = $id_historiaclinica2."-".$id_diagnostico1;
									$res = Historiaclinicadiagnostico::create($id_historiaclinica2, $id_diagnostico1, $verificador_hisclidia);
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
																		