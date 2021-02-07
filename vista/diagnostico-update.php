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
						<h3 class="box-title">Actualizar Diagnostico</h3>
					</div>
					
					<!-- <?php
						if(isset($_GET["id_diagnostico"]) and !empty($_GET["id_diagnostico"])){
							require_once("../modelo/Diagnostico.php");
							$id_diagnostico = Connection::sanitize($_GET["id_diagnostico"]);
							$res = diagnostico::single_row($id_diagnostico);
						}
					?> -->
					
					<form action="#" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="box-body">
							
							<input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Id:</label>
								<div class="col-sm-10">
									<input type="text" name="id_diagnostico" value="<?php echo $res->id_diagnostico;?>" class="form-control" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Cie10:</label>
								<div class="col-sm-10">
									<input type="text" name="cie10_dia" value="<?php echo $res->cie10_dia;?>" class="form-control" required autofocus>
								</div>
							</div>
							
							<div class="form-group">
							<label class="col-sm-2 control-label">Descripción:</label>
							<div class="col-sm-10">
							<input type="text" name="descripcion_dia" value="<?php echo $res->descripcion_dia;?>" class="form-control" required>
							</div>
							</div>
							
							</div>
							<div class="box-footer">
							<button type="submit" class="btn btn-success"><i class="fas fa-sync-alt"></i> Actualizar</button>
							<a class="btn btn-info" href="diagnostico-read.php" role="button"><i class="fas fa-times"></i> Cancelar</a>
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
							require_once("../controlador/ControladorDiagnostico.php");
							ControladorDiagnostico::update();
							?>
							
							<?php
							}
							ob_end_flush();
							?>
														