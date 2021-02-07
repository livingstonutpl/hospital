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
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Eliminar Especialidad</h3>
					</div>
					
					<!-- <?php
						if(isset($_GET["id_especialidad"]) and !empty($_GET["id_especialidad"])){
							require_once("../modelo/Especialidad.php");
							$id_especialidad = Connection::sanitize($_GET["id_especialidad"]);
							$res = especialidad::single_row($id_especialidad);
						}
					?> -->
					
					<form action="#" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="box-body">
							
							<input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Id:</label>
								<div class="col-sm-10">
									<input type="text" name="id_especialidad" value="<?php echo $res->id_especialidad;?>" class="form-control" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Nombre:</label>
								<div class="col-sm-10">
									<input type="text" name="nombre_esp" value="<?php echo $res->nombre_esp;?>" class="form-control" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Descripción:</label>
								<div class="col-sm-10">
									<textarea rows="3" name="descripcion_esp" class="form-control" readonly><?php echo $res->descripcion_esp;?></textarea>
								</div>
							</div>
							
						</div>
						<div class="box-footer">
							<p>¿Está seguro que desea eliminar el registro?</p>
							<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Eliminar</button>
							<a class="btn btn-info" href="especialidad-read.php" role="button"><i class="fas fa-times"></i> Cancelar</a>
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
		require_once("../controlador/ControladorEspecialidad.php");
		ControladorEspecialidad::delete();
	?>
	
	<?php
	}
	ob_end_flush();
?>
