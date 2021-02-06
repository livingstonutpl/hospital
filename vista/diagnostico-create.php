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
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Nuevo Diagnóstico</h3>
					</div>
					
					<form action="#" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="box-body">
							
							<input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Cie10:</label>
								<div class="col-sm-10">
									<input type="text" name="cie10_dia" placeholder="Cie10" class="form-control" required autofocus>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Descripción:</label>
								<div class="col-sm-10">
									<input type="text" name="descripcion_dia" placeholder="Descripcion" class="form-control" required>
								</div>
							</div>
							
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
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
		ControladorDiagnostico::create();
		?>
		
		<?php
		}
		ob_end_flush();
		?>
				