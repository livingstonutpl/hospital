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
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Eliminar Historial Diagnósticos</h3>
					</div>
					
					<!-- <?php
						if(isset($_GET["id_historiaclinicadiagnostico"]) && !empty($_GET["id_historiaclinicadiagnostico"])){
							require_once("../modelo/Historiaclinicadiagnostico.php");
							$id_historiaclinicadiagnostico = Connection::sanitize($_GET["id_historiaclinicadiagnostico"]);
							$res = historiaclinicadiagnostico::single_row($id_historiaclinicadiagnostico);
						}
					?> -->
					
					<form action="#" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="box-body">
							
							<input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Id:</label>
								<div class="col-sm-10">
									<input type="text" name="id_historiaclinicadiagnostico" value="<?php echo $res->id_historiaclinicadiagnostico;?>" class="form-control" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Historial:</label>
								<div class="col-sm-10">
									<?php
										require_once("../modelo/Historiaclinica.php");
										$res2 = Historiaclinica::read();
										while ($dato2 = mysqli_fetch_object($res2)){
											if ($res->id_historiaclinica2 == $dato2->id_historiaclinica){
												$id_historiaclinica2 = $dato2->id_historiaclinica." - ".$dato2->fechaatencion_his;
											}
										}
										?>
										<input type="text" name="id_historiaclinica2" value="<?php echo $id_historiaclinica2;?>" class="form-control" readonly>
										</div>
										</div>
										
										<div class="form-group">
										<label class="col-sm-2 control-label">Diagnóstico:</label>
										<div class="col-sm-10">
										<?php
										require_once("../modelo/Diagnostico.php");
										$res2 = Diagnostico::read();
										while ($dato2 = mysqli_fetch_object($res2)){
										if ($res->id_diagnostico1 == $dato2->id_diagnostico){
										$id_diagnostico1 = $dato2->id_diagnostico." - ".$dato2->cie10_dia;
										}
										}
										?>
										<input type="text" name="id_diagnostico1" value="<?php echo $id_diagnostico1;?>" class="form-control" readonly>
										</div>
										</div>
										
										</div>
										<div class="box-footer">
										<p>&iquest;Est&aacute; seguro que desea eliminar el registro?</p>
										<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Eliminar</button>
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
										ControladorHistoriaclinicadiagnostico::delete();
										?>
										
										<?php
										}
										ob_end_flush();
										?>
																				