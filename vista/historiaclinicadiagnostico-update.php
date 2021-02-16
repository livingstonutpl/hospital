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
						<h3 class="box-title">Actualizar Historial Diagnósticos</h3>
					</div>
					
					<!-- <?php
						if(isset($_GET["id_historiaclinicadiagnostico"]) and !empty($_GET["id_historiaclinicadiagnostico"])){
							require_once("../modelo/Historiaclinicadiagnostico.php");
							$id_historiaclinicadiagnostico = Connection::sanitize($_GET["id_historiaclinicadiagnostico"]);
							$res = historiaclinicadiagnostico::single_row($id_historiaclinicadiagnostico);
						}
					?> -->
					
					<form action="#" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="box-body">
							
							<input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">
							
							<input type="hidden" name="id_historiaclinicadiagnostico" value="<?php echo $res->id_historiaclinicadiagnostico;?>" class="form-control" readonly>
							
							<!-- NO ES NECESARIO MOSTRAR PARA ACTUALIZAR EL DIAGNOSTICO -->
							<!--<div class="form-group">
								<label class="col-sm-2 control-label">Cédula:</label>
								<div class="col-sm-10">
								<select name="id_historiaclinica2" class="form-control select2" style="width: 100%;" required autofocus>
								<option value=''>Historia</option>
								// <?php
									// require_once("../modelo/Historiaclinica.php");
									// $res2 = Historiaclinica::read();
									// while ($dato2 = mysqli_fetch_object($res2)){ 
									// $selected = ($res->id_historiaclinica2 == $dato2->id_historiaclinica) ? "selected" : "" ;
									// echo "<option ".$selected." value='".$dato2->id_historiaclinica."'>".$dato2->cedula_per." - ".$dato2->fechaatencion_his."</option>";
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
										$selected = ($res->id_diagnostico1 == $dato2->id_diagnostico) ? "selected" : "" ;
										echo "<option ".$selected." value='".$dato2->id_diagnostico."'>".$dato2->cie10_dia." - ".$dato2->descripcion_dia."</option>";
										}
										?>
										</select>
										</div>
										</div>
										
										</div>
										<div class="box-footer">
										<button type="submit" class="btn btn-success"><i class="fas fa-sync-alt"></i> Actualizar</button>
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
										$id_historiaclinicadiagnostico = Connection::sanitize($_POST["id_historiaclinicadiagnostico"]);
										$id_historiaclinica2 = Connection::sanitize($_POST["id_historiaclinica2"]);
										$id_diagnostico1 = Connection::sanitize($_POST["id_diagnostico1"]);
										$verificador_hisclidia = $id_historiaclinica2."-".$id_diagnostico1;
										$res = Historiaclinicadiagnostico::update($id_historiaclinicadiagnostico, $id_historiaclinica2, $id_diagnostico1, $verificador_hisclidia);
										if($res){
										$msg = base64_encode("<script>toastr.success('Registro actualizado correctamente');</script>");
										}else{
										$msg = base64_encode("<script>toastr.error('Registro duplicado');</script>");
										}
										header ("Location: historiaclinica-read.php?msg=$msg");
										}else{
										echo "<script>toastr.error('El registro no se pudo actualizar');</script>";
										}
										}
										?>
										
										<?php
										}
										ob_end_flush();
										?>
																				