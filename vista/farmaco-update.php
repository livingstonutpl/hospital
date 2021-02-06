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
						<h3 class="box-title">Actualizar F&aacute;rmaco</h3>
					</div>
					
					<!-- <?php
						if(isset($_GET["id_farmaco"]) && !empty($_GET["id_farmaco"])){
							require_once("../modelo/Farmaco.php");
							$id_farmaco = Connection::sanitize($_GET["id_farmaco"]);
							$res = farmaco::single_row($id_farmaco);
						}
					?> -->
					
					<form action="#" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="box-body">
							
							<input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Id:</label>
								<div class="col-sm-10">
									<input type="text" name="id_farmaco" value="<?php echo $res->id_farmaco;?>" class="form-control" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Nombre:</label>
								<div class="col-sm-10">
									<input type="text" name="nombre_far" value="<?php echo $res->nombre_far;?>" class="form-control" required autofocus>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Presentación:</label>
								<div class="col-sm-10">
									<textarea rows="3" name="presentacion_far" class="form-control" required><?php echo $res->presentacion_far;?></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Administración:</label>
								<div class="col-sm-10">
									<textarea rows="3" name="administracion_far" class="form-control" required><?php echo $res->administracion_far;?></textarea>
								</div>
							</div>
							
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-success"><i class="fas fa-sync-alt"></i> Actualizar</button>
							<a class="btn btn-info" href="farmaco-read.php" role="button"><i class="fas fa-times"></i> Cancelar</a>
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
		require_once("../controlador/ControladorFarmaco.php");
		ControladorFarmaco::update();
	?>
	
	<?php
	}
	ob_end_flush();
	?>
		