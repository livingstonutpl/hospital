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
						<h3 class="box-title">Eliminar Receta</h3>
					</div>
					
					<!-- <?php
						if(isset($_GET["id_receta"]) and !empty($_GET["id_receta"])){
							require_once("../modelo/Receta.php");
							$id_receta = Connection::sanitize($_GET["id_receta"]);
							$res = receta::single_row($id_receta);
						}
					?> -->
					
					<form action="#" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="box-body">
							
							<input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Id:</label>
								<div class="col-sm-10">
									<input type="text" name="id_receta" value="<?php echo $res->id_receta;?>" class="form-control" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Historial:</label>
								<div class="col-sm-10">
									<?php
										require_once("../modelo/Historiaclinica.php");
										$res2 = Historiaclinica::read();
										while ($dato2 = mysqli_fetch_object($res2)){
											if ($res->id_historiaclinica1 == $dato2->id_historiaclinica){
												$id_historiaclinica1 = $dato2->cedula_per." - "
												.$dato2->nombre_per." ".$dato2->apellido_per." - "
												.$dato2->fechaatencion_his." - "
												.$dato2->horaatencion_his;
											}
										}
									?>
									<input type="text" name="id_historiaclinica1" value="<?php echo $id_historiaclinica1;?>" class="form-control" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Fecha:</label>
								<div class="col-sm-10">
									<input type="text" name="fecha_rec" value="<?php echo $res->fecha_rec;?>" class="form-control" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Hora:</label>
								<div class="col-sm-10">
									<input type="text" name="hora_rec" value="<?php echo $res->hora_rec;?>" class="form-control" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Estado:</label>
								<div class="col-sm-10">
									<input type="text" name="estado_rec" value="<?php echo $res->estado_rec;?>" class="form-control" readonly>
								</div>
							</div>
							
						</div>
						<div class="box-footer">
							<p>¿Está seguro que desea eliminar el registro?</p>
							<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Eliminar</button>
							<a class="btn btn-info" href="receta-read.php" role="button"><i class="fas fa-times"></i> Cancelar</a>
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
		require_once("../controlador/ControladorReceta.php");
		ControladorReceta::delete();
	?>
	
	<?php
	}
	ob_end_flush();
?>
